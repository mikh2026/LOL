<?php
/**
 * WooCommerce Debug Helper
 * Файл для диагностики проблем с WooCommerce и виджетами фильтра
 */

// Проверяем, что файл вызывается из WordPress
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Класс для диагностики проблем WooCommerce
 */
class WooCommerce_Debug_Helper {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_debug_menu'));
        add_action('wp_ajax_test_woocommerce_api', array($this, 'test_woocommerce_api'));
        add_action('wp_ajax_test_woocommerce_blocks', array($this, 'test_woocommerce_blocks'));
    }
    
    /**
     * Добавляем меню диагностики в админку
     */
    public function add_debug_menu() {
        add_management_page(
            'WooCommerce Debug',
            'WC Debug',
            'manage_options',
            'woocommerce-debug',
            array($this, 'debug_page')
        );
    }
    
    /**
     * Страница диагностики
     */
    public function debug_page() {
        ?>
        <div class="wrap">
            <h1>Диагностика WooCommerce</h1>
            
            <div class="card">
                <h2>Проверка WooCommerce</h2>
                <?php $this->check_woocommerce_status(); ?>
            </div>
            
            <div class="card">
                <h2>Проверка REST API</h2>
                <?php $this->check_rest_api(); ?>
            </div>
            
            <div class="card">
                <h2>Проверка WooCommerce Blocks</h2>
                <?php $this->check_woocommerce_blocks(); ?>
            </div>
            
            <div class="card">
                <h2>Тестирование API</h2>
                <button id="test-api" class="button button-primary">Тестировать API</button>
                <div id="api-results"></div>
            </div>
            
            <div class="card">
                <h2>Исправление проблем</h2>
                <?php $this->fix_common_issues(); ?>
            </div>
        </div>
        
        <script>
        jQuery(document).ready(function($) {
            $('#test-api').on('click', function() {
                var button = $(this);
                button.prop('disabled', true).text('Тестируем...');
                
                $.post(ajaxurl, {
                    action: 'test_woocommerce_api',
                    nonce: '<?php echo wp_create_nonce('wc_debug_nonce'); ?>'
                }, function(response) {
                    $('#api-results').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');
                    button.prop('disabled', false).text('Тестировать API');
                }).fail(function() {
                    $('#api-results').html('<p style="color: red;">Ошибка AJAX запроса</p>');
                    button.prop('disabled', false).text('Тестировать API');
                });
            });
        });
        </script>
        <?php
    }
    
    /**
     * Проверяем статус WooCommerce
     */
    private function check_woocommerce_status() {
        if (class_exists('WooCommerce')) {
            echo '<p style="color: green;">✓ WooCommerce активен</p>';
            echo '<p>Версия: ' . WC()->version . '</p>';
        } else {
            echo '<p style="color: red;">✗ WooCommerce не активен</p>';
        }
        
        // Проверяем настройки постоянных ссылок
        $permalink_structure = get_option('permalink_structure');
        if ($permalink_structure) {
            echo '<p style="color: green;">✓ Постоянные ссылки настроены: ' . $permalink_structure . '</p>';
        } else {
            echo '<p style="color: red;">✗ Постоянные ссылки не настроены</p>';
        }
        
        // Проверяем REST API
        if (get_option('woocommerce_api_enabled') === 'yes') {
            echo '<p style="color: green;">✓ WooCommerce REST API включен</p>';
        } else {
            echo '<p style="color: red;">✗ WooCommerce REST API отключен</p>';
        }
    }
    
    /**
     * Проверяем REST API
     */
    private function check_rest_api() {
        $rest_url = get_rest_url();
        echo '<p>REST URL: ' . $rest_url . '</p>';
        
        // Проверяем доступность REST API
        $response = wp_remote_get($rest_url);
        if (!is_wp_error($response) && $response['response']['code'] === 200) {
            echo '<p style="color: green;">✓ REST API доступен</p>';
        } else {
            echo '<p style="color: red;">✗ REST API недоступен</p>';
            if (is_wp_error($response)) {
                echo '<p>Ошибка: ' . $response->get_error_message() . '</p>';
            }
        }
        
        // Проверяем WooCommerce REST API
        $wc_rest_url = $rest_url . 'wc/v3/';
        $wc_response = wp_remote_get($wc_rest_url);
        if (!is_wp_error($wc_response) && $wc_response['response']['code'] === 200) {
            echo '<p style="color: green;">✓ WooCommerce REST API доступен</p>';
        } else {
            echo '<p style="color: red;">✗ WooCommerce REST API недоступен</p>';
        }
    }
    
    /**
     * Проверяем WooCommerce Blocks
     */
    private function check_woocommerce_blocks() {
        if (class_exists('Automattic\WooCommerce\Blocks\Package')) {
            echo '<p style="color: green;">✓ WooCommerce Blocks активен</p>';
        } else {
            echo '<p style="color: red;">✗ WooCommerce Blocks не активен</p>';
            echo '<p>Для работы виджетов фильтра необходимо установить плагин WooCommerce Blocks</p>';
        }
        
        // Проверяем зарегистрированные блоки
        if (function_exists('register_block_type')) {
            echo '<p>✓ WordPress поддерживает блоки</p>';
        } else {
            echo '<p style="color: red;">✗ WordPress не поддерживает блоки</p>';
        }
    }
    
    /**
     * Тестируем WooCommerce API
     */
    public function test_woocommerce_api() {
        check_ajax_referer('wc_debug_nonce', 'nonce');
        
        $results = array();
        
        // Тест 1: Проверка REST API
        $rest_url = get_rest_url();
        $response = wp_remote_get($rest_url);
        if (!is_wp_error($response)) {
            $results['rest_api'] = array(
                'status' => 'success',
                'code' => $response['response']['code'],
                'url' => $rest_url
            );
        } else {
            $results['rest_api'] = array(
                'status' => 'error',
                'message' => $response->get_error_message()
            );
        }
        
        // Тест 2: Проверка WooCommerce API
        $wc_rest_url = $rest_url . 'wc/v3/';
        $wc_response = wp_remote_get($wc_rest_url);
        if (!is_wp_error($wc_response)) {
            $results['wc_api'] = array(
                'status' => 'success',
                'code' => $wc_response['response']['code'],
                'url' => $wc_rest_url
            );
        } else {
            $results['wc_api'] = array(
                'status' => 'error',
                'message' => $wc_response->get_error_message()
            );
        }
        
        // Тест 3: Проверка маршрутов
        $routes_response = wp_remote_get($rest_url . 'wp/v2/');
        if (!is_wp_error($routes_response)) {
            $results['routes'] = array(
                'status' => 'success',
                'code' => $routes_response['response']['code']
            );
        } else {
            $results['routes'] = array(
                'status' => 'error',
                'message' => $routes_response->get_error_message()
            );
        }
        
        wp_send_json_success($results);
    }
    
    /**
     * Исправляем распространенные проблемы
     */
    private function fix_common_issues() {
        echo '<h3>Автоматическое исправление</h3>';
        
        // Исправляем настройки постоянных ссылок
        if (get_option('permalink_structure') === '') {
            update_option('permalink_structure', '/%postname%/');
            echo '<p style="color: green;">✓ Исправлены настройки постоянных ссылок</p>';
        }
        
        // Включаем WooCommerce API
        if (get_option('woocommerce_api_enabled') !== 'yes') {
            update_option('woocommerce_api_enabled', 'yes');
            echo '<p style="color: green;">✓ Включен WooCommerce REST API</p>';
        }
        
        // Очищаем кэш постоянных ссылок
        flush_rewrite_rules();
        echo '<p style="color: green;">✓ Очищен кэш постоянных ссылок</p>';
        
        echo '<p><strong>Примечание:</strong> После внесения изменений может потребоваться обновить страницу.</p>';
    }
}

// Инициализируем класс
new WooCommerce_Debug_Helper();