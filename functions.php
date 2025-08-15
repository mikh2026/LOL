<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.10.1' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.10.0' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * ToDo: Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';




//-=-=-= Настройка валюты и цен =-=-=-//

// Удаляем цену в валюте, оставляем только баллы
add_filter('woocommerce_get_price_html', 'replace_money_with_points', 10, 2);
function replace_money_with_points($price, $product) {
    return wc_get_price_to_display($product) . ' <img src="https://test-merch.alean.ru/wp-content/uploads/2025/05/android-icon-192x192-1.png" width="17" alt="Логотип" class="logo">';
}
// Добавляем виртуальный метод оплаты баллами
add_filter('woocommerce_payment_gateways', 'add_points_payment_gateway');
function add_points_payment_gateway($gateways) {
    $gateways[] = 'WC_Points_Payment_Gateway';
    return $gateways;
}

// Создаем класс платежного шлюза
add_action('plugins_loaded', 'init_points_payment_gateway');
function init_points_payment_gateway() {
    class WC_Points_Payment_Gateway extends WC_Payment_Gateway {
        public function __construct() {
            $this->id = 'points_payment';
            $this->title = 'Оплата баллами';
            $this->method_title = 'Баллы';
            $this->method_description = 'Оплата заказа баллами.';
            $this->supports = array('products');
            $this->init_form_fields();
            $this->init_settings();
        }

public function process_payment($order_id) {
    $order = wc_get_order($order_id);
    $user = $order->get_user();
    $email = $order->get_billing_email();
    $total = $order->get_total();
    
    try {
        // 1. Ставим заказ в ожидание
        $order->update_status('pending', __('Ожидание списания баллов', 'textdomain'));
        
        // 2. Проверяем баланс
        $balance_data = $this->get_lp_data($email);
        if ($balance_data['lp-status'] !== 'TRUE' || $balance_data['total_points'] < $total) {
            throw new Exception(__('Недостаточно бонусных баллов', 'textdomain'));
        }
        
        // 3. Списание баллов
        $response = $this->spend_points(
            $email,
            $total,
            'order_' . $order_id,
            'Оплата заказа #' . $order_id
        );
        
        if (isset($response['error'])) {
            throw new Exception($response['message']);
        }
        
        // 4. Подтверждаем оплату
        $order->payment_complete();
        $order->add_order_note(__('Оплачено баллами. Списано: ', 'textdomain') . $total);
        
        // 5. Очистка корзины
        WC()->cart->empty_cart();
        
        return array(
            'result' => 'success',
            'redirect' => $this->get_return_url($order)
        );
        
    } catch (Exception $e) {
        // Возврат баллов при ошибке (если API позволяет)
        // $this->refund_points(...);
        
        $order->update_status('failed', $e->getMessage());
        wc_add_notice($e->getMessage(), 'error');
        return false;
    }
}
    }
}
// Добавляем колонку "Баллы" в админку пользователей
add_filter('manage_users_columns', 'add_user_points_column');
function add_user_points_column($columns) {
    $columns['user_points'] = 'Баллы';
    return $columns;
}

// Заполняем колонку данными
add_action('manage_users_custom_column', 'fill_user_points_column', 10, 3);
function fill_user_points_column($value, $column_name, $user_id) {
    if ($column_name == 'user_points') {
        return get_user_meta($user_id, 'user_points', true) ?: '0';
    }
    return $value;
}
// Заменяем символ валюты на картинку
add_filter('woocommerce_currency_symbol', 'custom_currency_symbol_image', 10, 2);
function custom_currency_symbol_image($currency_symbol, $currency) {
    if ($currency === 'RUB' || $currency === 'USD' || $currency === 'EUR') { // Укажите вашу валюту
        return '<img src="/wp-content/uploads/2025/05/android-icon-192x192-1.png" alt="Баллы" class="custom-currency-icon" width="20" height="20" />';
    }
    return $currency_symbol;
} 








//-=-=-= API и AJAX обработчики =-=-=-//

add_action('wp_ajax_get_loyalty_data', 'get_loyalty_data_callback');
add_action('wp_ajax_nopriv_get_loyalty_data', 'auth_required');

function get_loyalty_data_callback() {
    if (!is_user_logged_in()) {
        wp_send_json_error('Требуется авторизация', 401);
    }

    $user = wp_get_current_user();
    $response = wp_remote_post('https://n8n.alean.ru/webhook/get-lp-email', [
        'headers' => ['Content-Type' => 'application/json'],
        'body' => json_encode(['email' => $user->user_email])
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error($response->get_error_message(), 500);
    }

    wp_send_json(json_decode(wp_remote_retrieve_body($response), true));
}

function auth_required() {
    wp_send_json_error('Требуется авторизация', 401);
}


/*
add_filter('rest_pre_serve_request', function($value) {
    header('Access-Control-Allow-Origin: ' . get_site_url());
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type, X-WP-Nonce');
    return $value;
});

*/



add_filter('rest_post_dispatch', function($response) {
  $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
  return $response;
});



/**
 * Обработчик списания бонусов (тестовый режим)
 */
function handle_bonus_deduction(WP_REST_Request $request) {
    $user = wp_get_current_user();
    $amount = $request->get_param('amount');
    $reason = $request->get_param('reason');
    
    // Тестовый режим - не списываем реально, только логируем
    $log_entry = sprintf(
        "[%s] Тестовое списание: %s, сумма: %d, причина: %s",
        current_time('mysql'),
        $user->user_email,
        $amount,
        $reason
    );
    
    // Логируем в файл (для теста)
    file_put_contents(
        WP_CONTENT_DIR . '/bonus-deductions.log',
        $log_entry . PHP_EOL,
        FILE_APPEND
    );
    
    // Получаем текущие баллы (имитация)
    $current_points = get_user_meta($user->ID, 'alean_bonus_points', true) ?: 100; // Тестовое значение
    
    // Проверяем достаточно ли баллов
    if ($current_points < $amount) {
        return new WP_Error(
            'insufficient_funds',
            'Недостаточно бонусных баллов',
            ['status' => 400]
        );
    }
    
    // Имитация списания (в тестовом режиме не изменяем реальный баланс)
    $new_balance = $current_points - $amount;
    
    return [
        'status' => 'success',
        'message' => 'Тестовое списание выполнено',
        'details' => [
            'user_id' => $user->ID,
            'user_email' => $user->user_email,
            'amount_deducted' => $amount,
            'new_balance' => $new_balance,
            'reason' => $reason,
            'mode' => 'test' // Режим тестирования
        ]
    ];
}



// Устанавливаем валюту "баллы" (без символа)
add_filter('woocommerce_currencies', 'add_alean_currency');
function add_alean_currency($currencies) {
    $currencies['BAL'] = 'Баллы';
    return $currencies;
}

// Убираем символ валюты (чтобы было просто "100 баллов")
add_filter('woocommerce_currency_symbol', 'alean_currency_symbol', 10, 2);
function alean_currency_symbol($symbol, $currency) {
    return ($currency == 'BAL') ? '' : $symbol;
}

// Принудительно устанавливаем валюту магазина
update_option('woocommerce_currency', 'BAL');






// Платежный шлюз баллами
add_action('plugins_loaded', 'init_alean_loyalty_gateway');
function init_alean_loyalty_gateway() {
    if (!class_exists('WC_Payment_Gateway')) return;
    
    class WC_Gateway_Alean_Loyalty extends WC_Payment_Gateway {
        
        public function __construct() {
            $this->id = 'alean_loyalty';
            $this->method_title = 'Оплата баллами';
            $this->method_description = 'Безопасная оплата бонусными баллами';
            $this->has_fields = true;
            
            $this->init_form_fields();
            $this->init_settings();
            
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
        }
        
        public function init_form_fields() {
            $this->form_fields = [
                'enabled' => [
                    'title' => 'Включить',
                    'type' => 'checkbox',
                    'label' => 'Включить оплату баллами',
                    'default' => 'yes'
                ],
                'title' => [
                    'title' => 'Название',
                    'type' => 'text',
                    'default' => 'Оплата баллами'
                ],
                'max_amount' => [
                    'title' => 'Макс. сумма',
                    'type' => 'number',
                    'description' => 'Максимальная сумма для оплаты баллами',
                    'default' => 5000
                ]
            ];
        }
        
        public function payment_fields() {
            if (!is_user_logged_in()) {
                echo '<p>Требуется авторизация</p>';
                return;
            }
            
            $user = wp_get_current_user();
            $balance = alean_get_user_balance($user->user_email);
            $cart_total = WC()->cart->total;
            
            echo '<div class="alean-balance-info">';
            echo '<p>Доступно баллов: <strong>' . $balance . '</strong></p>';
            echo '<p>Сумма заказа: <strong>' . wc_price($cart_total) . '</strong></p>';
            
            if ($balance >= $cart_total) {
                echo '<p class="success">Можно оплатить баллами</p>';
            } else {
                echo '<p class="error">Недостаточно баллов</p>';
            }
            
            echo '</div>';
        }
        
        public function validate_fields() {
            if (!is_user_logged_in()) {
                wc_add_notice('Требуется авторизация', 'error');
                return false;
            }
            
            $user = wp_get_current_user();
            $cart_total = WC()->cart->total;
            $balance = alean_get_user_balance($user->user_email);
            
            if ($balance < $cart_total) {
                wc_add_notice('Недостаточно баллов', 'error');
                return false;
            }
            
            if ($cart_total > $this->get_option('max_amount', 5000)) {
                wc_add_notice('Превышена максимальная сумма оплаты баллами', 'error');
                return false;
            }
            
            return true;
        }
        
        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            $user = wp_get_current_user();
            $email = $user->user_email;
            $total = $order->get_total();
            
            // Двойная проверка баланса
            $balance = alean_get_user_balance($email);
            if ($balance < $total) {
                wc_add_notice('Недостаточно баллов', 'error');
                return false;
            }
            
            // API запрос
            $response = wp_remote_post(
                rest_url('alean/v1/spend-points'),
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'X-WP-Nonce' => wp_create_nonce('wp_rest')
                    ],
                    'body' => json_encode([
                        'email' => $email,
                        'amount' => $total,
                        'order_id' => $order_id
                    ]),
                    'timeout' => 15
                ]
            );
            
            if (is_wp_error($response)) {
                wc_add_notice('Ошибка соединения', 'error');
                return false;
            }
            
            $body = json_decode(wp_remote_retrieve_body($response), true);
            
            if (!isset($body['status']) || $body['status'] !== 'success') {
                wc_add_notice($body['message'] ?? 'Ошибка списания', 'error');
                return false;
            }
            
            // Успешная оплата
            $order->payment_complete();
            WC()->cart->empty_cart();
            
            return [
                'result' => 'success',
                'redirect' => $this->get_return_url($order)
            ];
        }
    }
    
    // Регистрация шлюза
    function add_alean_loyalty_gateway($methods) {
        $methods[] = 'WC_Gateway_Alean_Loyalty';
        return $methods;
    }
    add_filter('woocommerce_payment_gateways', 'add_alean_loyalty_gateway');
}

/**
 * Получение баланса пользователя
 */
function alean_get_user_balance($email) {
    $response = wp_remote_post(
        'https://n8n.alean.ru/webhook/get-lp-email',
        [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['email' => $email]),
            'timeout' => 10
        ]
    );
    
    if (is_wp_error($response)) {
        return 0;
    }
    
    $data = json_decode(wp_remote_retrieve_body($response), true);
    
    return isset($data['total_points']) ? (float)$data['total_points'] : 0;
}












/**
 * WooCommerce Alean Loyalty Points Integration
 */
class Alean_Loyalty_WooCommerce {
    
    public function __construct() {
        // Инициализация хуков
        $this->init_hooks();
    }
    
    private function init_hooks() {
        // Добавляем баллы как метод оплаты
        add_filter('woocommerce_payment_gateways', [$this, 'add_payment_gateway']);
        
        // Проверка доступных баллов при оформлении заказа
        add_action('woocommerce_review_order_before_payment', [$this, 'check_loyalty_points']);
        
        // Списание баллов после создания заказа
        add_action('woocommerce_checkout_order_processed', [$this, 'process_loyalty_payment'], 10, 3);
        
        // Отображение баланса баллов в личном кабинете
        add_action('woocommerce_account_dashboard', [$this, 'show_loyalty_balance']);
    }
    
    /**
     * Добавляем наш метод оплаты баллами
     */
    public function add_payment_gateway($gateways) {
        $gateways[] = 'Alean_Loyalty_Payment_Gateway';
        return $gateways;
    }
    
    /**
     * Проверка доступных баллов
     */
    public function check_loyalty_points() {
        $user = wp_get_current_user();
        if (!$user->ID) return;
        
        $response = $this->get_lp_data($user->user_email);
        if ($response['lp-status'] === 'TRUE') {
            $balance = $response['total_points'];
            echo '<div class="loyalty-points-balance">';
            echo '<h3>Ваш баланс бонусных баллов: ' . $balance . '</h3>';
            echo '</div>';
        }
    }
    
    /**
     * Обработка оплаты баллами
     */
    public function process_loyalty_payment($order_id, $posted_data, $order) {
        if ($order->get_payment_method() !== 'alean_loyalty') return;
        
        $user = $order->get_user();
        $email = $order->get_billing_email();
        $total = $order->get_total();
        
        // Получаем данные о баллах
        $lp_data = $this->get_lp_data($email);
        if ($lp_data['lp-status'] !== 'TRUE') {
            throw new Exception('Не удалось получить данные бонусной программы');
        }
        
        // Проверяем достаточность баллов
        if ($lp_data['total_points'] < $total) {
            throw new Exception('Недостаточно бонусных баллов для оплаты заказа');
        }
        
        // Списание баллов
        $result = $this->spend_loyalty_points(
            $email,
            $total,
            'order_' . $order_id,
            'Оплата заказа #' . $order_id
        );
        
// ИСПРАВЛЕНО: убираем неправильное сообщение об ошибке
if (!is_array($result) || !isset($result['status'])) {
    error_log('Loyalty payment API error for order ' . $order_id . ': ' . print_r($result, true));
    throw new Exception('Ошибка при списании баллов');
}
        
        // Помечаем заказ как оплаченный
        $order->payment_complete();
        $order->add_order_note('Оплачено баллами. Списано: ' . $total . ' баллов');
    }
    
    //-=-=-= Оплата баллами =-=-=-//
    
    /**
     * Отображение баланса в личном кабинете
     */
    public function show_loyalty_balance() {
        $user = wp_get_current_user();
        $response = $this->get_lp_data($user->user_email);
        
        if ($response['lp-status'] === 'TRUE') {
            echo '<div class="loyalty-account-section">';
            echo '<h2>Бонусная программа</h2>';
            echo '<p>Текущий баланс: <strong>' . $response['total_points'] . ' баллов</strong></p>';
            
            if (!empty($response['activities'])) {
                echo '<h3>История операций:</h3>';
                echo '<ul>';
                foreach ($response['activities'] as $activity) {
                    echo '<li>' . esc_html($activity) . '</li>';
                }
                echo '</ul>';
            }
            
            echo '</div>';
        }
    }
    
    /**
     * Вспомогательные методы для работы с API
     */
private function get_lp_data($email) {
    $url = 'https://n8n.alean.ru/webhook/get-lp-email';
    $args = [
        'headers' => ['Content-Type' => 'application/json'],
        'timeout' => 15,
        'body' => json_encode(['email' => $email])
    ];

    error_log('Requesting LP data for email: ' . $email);
    $response = wp_remote_post($url, $args);

    if (is_wp_error($response)) {
        error_log('LP Data API Error: ' . $response->get_error_message());
        return ['lp-status' => 'FALSE', 'error' => $response->get_error_message()];
    }

    $body = wp_remote_retrieve_body($response);
    error_log('LP Data API Response: ' . $body);

    $data = json_decode($body, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error: ' . json_last_error_msg());
        return ['lp-status' => 'FALSE', 'error' => 'Invalid JSON'];
    }

    return $data;
}
    
    private function spend_loyalty_points($email, $sum, $order_id, $comment) {
        $response = wp_remote_post(
            'https://n8n.alean.ru/webhook/lp-spending',
            [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode([
                    'email' => $email,
                    'sum' => $sum,
                    'eventexternalid' => $order_id,
                    'comment' => $comment
                ])
            ]
        );
        
        if (is_wp_error($response)) {
            return ['status' => 'error', 'message' => $response->get_error_message()];
        }
        
        return json_decode(wp_remote_retrieve_body($response), true);
    }
}

// Инициализация интеграции
new Alean_Loyalty_WooCommerce();










/**
 * Payment Gateway for Alean Loyalty Points
 */
class Alean_Loyalty_Payment_Gateway extends WC_Payment_Gateway {
    
    public function __construct() {
        $this->id = 'alean_loyalty';
        $this->method_title = 'Оплата бонусными баллами';
        $this->method_description = 'Оплата заказа с использованием бонусных баллов';
        $this->has_fields = true;
        
        // Инициализация настроек
        $this->init_form_fields();
        $this->init_settings();
        
        // Переопределение настроек
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        
        // Сохранение настроек
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
    }
    
    /**
     * Настройки платежного шлюза
     */
    public function init_form_fields() {
        $this->form_fields = [
            'enabled' => [
                'title' => 'Включено',
                'type' => 'checkbox',
                'label' => 'Включить оплату бонусными баллами',
                'default' => 'yes'
            ],
            'title' => [
                'title' => 'Название',
                'type' => 'text',
                'description' => 'Название метода оплаты, которое видит покупатель',
                'default' => 'Оплата бонусными баллами',
                'desc_tip' => true
            ],
            'description' => [
                'title' => 'Описание',
                'type' => 'textarea',
                'description' => 'Описание метода оплаты, которое видит покупатель',
                'default' => 'Оплатите заказ с использованием ваших бонусных баллов',
                'desc_tip' => true
            ]
        ];
    }
    
    /**
     * Поля для ввода на странице оплаты
     */
    public function payment_fields() {
    $user = wp_get_current_user();
    if (!$user->ID) {
        echo '<p>Для оплаты баллами необходимо авторизоваться</p>';
        return;
    }
    error_log('Current user email: ' . $user->user_email);
        
        $response = wp_remote_post(
            'https://n8n.alean.ru/webhook/get-lp-email',
            [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode(['email' => $user->user_email])
            ]
        );
        
        if (is_wp_error($response)) {
            echo '<p>Ошибка получения данных бонусной программы</p>';
            return;
        }
        
        $data = json_decode(wp_remote_retrieve_body($response), true);
        
        if (empty($data['lp-status']) || (isset($data['lp-status']) && strtolower($data['lp-status']) !== 'true')) {
            echo '<p>Вы не участвуете в бонусной программе</p>';
            return;
        }
        
        $balance = $data['total_points'];
        $order_total = WC()->cart->total;
        
        echo '<div class="loyalty-payment-fields">';
        echo '<p>Ваш баланс: <strong>' . $balance . ' баллов</strong></p>';
        echo '<p>Сумма заказа: <strong>' . wc_price($order_total) . '</strong></p>';
        
        if ($balance >= $order_total) {
            echo '<p>Вы можете оплатить весь заказ бонусными баллами</p>';
        } else {
            echo '<p class="error">Недостаточно баллов для оплаты заказа</p>';
        }
        
        echo '</div>';
    }
    
    /**
     * Валидация платежа
     */
    public function validate_fields() {
        $user = wp_get_current_user();
        $email = $user->user_email;
        $order_total = WC()->cart->total;
        
        $response = wp_remote_post(
            'https://n8n.alean.ru/webhook/get-lp-email',
            [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode(['email' => $email])
            ]
        );
        
        if (is_wp_error($response)) {
            wc_add_notice('Ошибка проверки бонусных баллов', 'error');
            return false;
        }
        
        $data = json_decode(wp_remote_retrieve_body($response), true);
        
        if ($data['lp-status'] !== 'TRUE' || $data['total_points'] < $order_total) {
            wc_add_notice('Недостаточно бонусных баллов для оплаты заказа', 'error');
            return false;
        }
        
        return true;
    }
    
    /**
     * Обработка платежа
     */
public function process_payment($order_id) {
    $order = wc_get_order($order_id);
    $email = $order->get_billing_email();
    $total = $order->get_total();

    try {
        // 1. Проверяем баланс
        $balance_data = $this->get_lp_data($email);
        if (!isset($balance_data['lp-status']) || $balance_data['lp-status'] !== 'TRUE') {
            throw new Exception('Бонусная программа недоступна');
        }

        if ($balance_data['total_points'] < $total) {
            throw new Exception('Недостаточно баллов. Доступно: ' . $balance_data['total_points']);
        }

                    // 2. Списание баллов
            $spend_result = $this->spend_points($email, $total, 'order_'.$order_id, 'Оплата заказа #'.$order_id);

            // 3. КРИТИЧЕСКИ ВАЖНЫЕ ДЕЙСТВИЯ:
            $order->payment_complete();
            $order->add_order_note('Оплачено баллами. Списано: ' . $total . ' баллов');
        
        // 4. Очистка корзины ДО редиректа
        if (function_exists('WC') && WC()->cart) {
            WC()->cart->empty_cart();
        }

        // 5. Возвращаем правильный массив
        return array(
            'result'   => 'success',
            'redirect' => $this->get_return_url($order) // Используем встроенный метод
        );

    } catch (Exception $e) {
        // Логируем полную ошибку
        error_log('Loyalty Payment Error: ' . $e->getMessage() . ' | Order: ' . $order_id);
        
        // Добавляем понятное сообщение пользователю
        wc_add_notice($e->getMessage(), 'error');
        
        return array(
            'result' => 'failure',
            'messages' => $e->getMessage()
        );
    }
}
}










































add_action('wp_ajax_alean_get_bonus_data', 'alean_get_bonus_data_ajax');
add_action('wp_ajax_nopriv_alean_get_bonus_data', 'alean_auth_required');

function alean_get_bonus_data_ajax() {
    check_ajax_referer('alean_nonce', 'security');
    
    if (!is_user_logged_in()) {
        wp_send_json_error('Требуется авторизация', 401);
    }

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $current_user = wp_get_current_user();
    
    // Если email не указан, используем email текущего пользователя
    if (empty($email) && $current_user->ID) {
        $email = $current_user->user_email;
    }
    
 
    $data = alean_get_bonus_data($email);
    
    wp_send_json_success($data);
}

function alean_auth_required() {
    wp_send_json_error('Требуется авторизация', 401);
}












wp_localize_script('alean-loyalty-js', 'aleanLoyalty', [
    'rest_url' => rest_url('alean/v1/bonus'),
    'nonce' => wp_create_nonce('wp_rest') 
]);






add_filter('rest_authentication_errors', function($result) {
    return is_wp_error($result) ? $result : true;
});












//-=-=-= Страница настроек темы =-=-=-//

function custom_theme_settings_page() {
    add_menu_page(
        'Настройки темы', 
        'Настройки темы', 
        'manage_options', 
        'theme-settings', 
        'render_theme_settings_page',
        'dashicons-admin-generic',
        80
    );
}
add_action('admin_menu', 'custom_theme_settings_page');


function register_theme_settings() {
    register_setting('theme_settings_group', 'theme_settings');
    
    add_meta_box(
        'theme_logo_box',
        'Логотип и фавикон',
        'render_logo_meta_box',
        'theme_settings_page',
        'normal'
    );
    
    add_meta_box(
        'theme_contacts_box',
        'Контактная информация',
        'render_contacts_meta_box',
        'theme_settings_page',
        'normal'
    );
    
    add_meta_box(
        'theme_social_box',
        'Социальные сети',
        'render_social_meta_box',
        'theme_settings_page',
        'normal'
    );
}
add_action('admin_init', 'register_theme_settings');


function render_theme_settings_page() {
    ?>
    <div class="wrap">
        <h1>Настройки темы</h1>
        
        <form method="post" action="options.php">
            <?php
            settings_fields('theme_settings_group');
            do_meta_boxes('theme_settings_page', 'normal', null);
            submit_button('Сохранить настройки');
            ?>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Обработка кнопки загрузки изображения
        $('.upload_image_button').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(this);
            
            wp.media.editor.send.attachment = function(props, attachment) {
                $(button).parent().find('.image_url').val(attachment.url);
                $(button).parent().find('.image_preview').attr('src', attachment.url).show();
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            
            wp.media.editor.open(button);
            return false;
        });
        
        // Обработка кнопки удаления изображения
        $('.remove_image_button').click(function() {
            var button = $(this);
            $(button).parent().find('.image_url').val('');
            $(button).parent().find('.image_preview').hide();
            return false;
        });
    });
    </script>
    <?php
}


function render_logo_meta_box() {
    $settings = get_option('theme_settings');
    ?>
    <table class="form-table">
        <tr>
            <th><label>Логотип</label></th>
            <td>
                <input type="text" name="theme_settings[logo_url]" class="image_url regular-text" value="<?php echo esc_attr($settings['logo_url'] ?? ''); ?>">
                <input type="button" class="button upload_image_button" value="Выбрать изображение">
                <input type="button" class="button remove_image_button" value="Удалить">
                <div class="image_preview_wrap">
                    <?php if (!empty($settings['logo_url'])): ?>
                        <img src="<?php echo esc_url($settings['logo_url']); ?>" class="image_preview" style="max-width: 200px; height: auto; margin-top: 10px;">
                    <?php else: ?>
                        <img src="" class="image_preview" style="max-width: 200px; height: auto; margin-top: 10px; display: none;">
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th><label>Favicon</label></th>
            <td>
                <input type="text" name="theme_settings[favicon_url]" class="image_url regular-text" value="<?php echo esc_attr($settings['favicon_url'] ?? ''); ?>">
                <input type="button" class="button upload_image_button" value="Выбрать изображение">
                <input type="button" class="button remove_image_button" value="Удалить">
                <div class="image_preview_wrap">
                    <?php if (!empty($settings['favicon_url'])): ?>
                        <img src="<?php echo esc_url($settings['favicon_url']); ?>" class="image_preview" style="max-width: 32px; height: auto; margin-top: 10px;">
                    <?php else: ?>
                        <img src="" class="image_preview" style="max-width: 32px; height: auto; margin-top: 10px; display: none;">
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>
    <?php
}

function render_contacts_meta_box() {
    $settings = get_option('theme_settings');
    ?>
    <table class="form-table">
        <tr>
            <th><label>Телефон</label></th>
            <td>
                <input type="text" name="theme_settings[phone]" class="regular-text" value="<?php echo esc_attr($settings['phone'] ?? ''); ?>">
            </td>
        </tr>
        <tr>
            <th><label>Email</label></th>
            <td>
                <input type="email" name="theme_settings[email]" class="regular-text" value="<?php echo esc_attr($settings['email'] ?? ''); ?>">
            </td>
        </tr>
    </table>
    <?php
}

function render_social_meta_box() {
    $settings = get_option('theme_settings');
    ?>
    <table class="form-table">
        <tr>
            <th><label>WhatsApp</label></th>
            <td>
                <input type="url" name="theme_settings[whatsapp]" class="regular-text" value="<?php echo esc_attr($settings['whatsapp'] ?? ''); ?>">
            </td>
        </tr>
        <tr>
            <th><label>Telegram</label></th>
            <td>
                <input type="url" name="theme_settings[telegram]" class="regular-text" value="<?php echo esc_attr($settings['telegram'] ?? ''); ?>">
            </td>
        </tr>
        <tr>
            <th><label>Rutube</label></th>
            <td>
                <input type="url" name="theme_settings[rutube]" class="regular-text" value="<?php echo esc_attr($settings['rutube'] ?? ''); ?>">
            </td>
        </tr>
        <tr>
            <th><label>YouTube</label></th>
            <td>
                <input type="url" name="theme_settings[youtube]" class="regular-text" value="<?php echo esc_attr($settings['youtube'] ?? ''); ?>">
            </td>
        </tr>
        <tr>
            <th><label>VK</label></th>
            <td>
                <input type="url" name="theme_settings[vk]" class="regular-text" value="<?php echo esc_attr($settings['vk'] ?? ''); ?>">
            </td>
        </tr>
    </table>
    <?php
}

function add_favicon_to_head() {
    $settings = get_option('theme_settings');
    if (!empty($settings['favicon_url'])) {
        echo '<link rel="shortcut icon" href="' . esc_url($settings['favicon_url']) . '" />';
    }
}
add_action('wp_head', 'add_favicon_to_head');


function enqueue_media_uploader() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'enqueue_media_uploader');






//














/*



function alean_auth_shortcode() {
    ob_start();
    ?>

        <?php if (is_user_logged_in()) : ?>
            <?php
            $user = wp_get_current_user();
            $email = $user->user_email;
            
       
            $response = wp_remote_post(
                'https://n8n.alean.ru/webhook/get-lp-email',
                [
                    'headers' => ['Content-Type' => 'application/json'],
                    'body' => json_encode(['email' => $email]),
                    'timeout' => 15
                ]
            );
            
            if (!is_wp_error($response)) :
                $bonus_data = json_decode(wp_remote_retrieve_body($response), true);
                
                if ($bonus_data['lp-status'] === 'TRUE') : ?>
                   
                    <div class="auth-bonus-info">
                        <span class="user-name"><?php echo esc_html($bonus_data['name'] ?? $user->display_name); ?></span>
                        <span class="user-points"><?php echo esc_html($bonus_data['total_points'] ?? 0); ?> <img src="https://test-merch.alean.ru/wp-content/uploads/2025/05/android-icon-192x192-1.png" width="21" alt="Логотип" class="logo"></span>
                    </div>
                <?php else : ?>
                 
                    <div class="auth-bonus-register">
                        <span class="user-email"><?php echo esc_html($email); ?></span>
                        <a href="https://lnk.alean.ru/md/aleanlp-reg" class="register-link">Присоединиться к программе</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
           
            <a href="<?php echo wp_logout_url(home_url()); ?>" class="logout-button">Выйти</a>
        <?php else : ?>

            <a href="<?php echo esc_url(home_url('/?sso_login=1')); ?>" class="button--sso button">
            <svg  class="button__icon animated slideFade" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
<path d="M12.6777 12C15.4392 12 17.6777 9.76142 17.6777 7C17.6777 4.23858 15.4392 2 12.6777 2C9.91631 2 7.67773 4.23858 7.67773 7C7.67773 9.76142 9.91631 12 12.6777 12Z" stroke="#3595EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M21.4481 22C21.4481 18.13 17.5981 15 12.8581 15C8.11806 15 4.26807 18.13 4.26807 22" stroke="#3595EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

            <span  class="button__text">Войти через SSO</span>
            
            
            </a>
        <?php endif; ?>

    <?php
    return ob_get_clean();
}
add_shortcode('alean_auth', 'alean_auth_shortcode');

*/


function alean_auth_shortcode() {
    ob_start();
    ?>
    
    <?php if (is_user_logged_in()) : ?>
        <?php
        $user = wp_get_current_user();
        $email = $user->user_email;
        $display_name = $user->display_name;
        
        $response = wp_remote_post(
            'https://n8n.alean.ru/webhook/get-lp-email',
            [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode(['email' => $email]),
                'timeout' => 15
            ]
        );
        
        if (!is_wp_error($response)) :
            $bonus_data = json_decode(wp_remote_retrieve_body($response), true);
            
          
            function get_initials($full_name) {
                $parts = explode(' ', $full_name);
                $initials = '';
                
               
                for ($i = 0; $i < min(2, count($parts)); $i++) {
                    if (!empty($parts[$i])) {
                        $initials .= mb_substr($parts[$i], 0, 1);
                    }
                }
                
                return $initials ?: mb_substr($full_name, 0, 2);
            }
            
    
            $name_to_use = $bonus_data['name'] ?? $display_name;
            $initials = get_initials($name_to_use);
            
            if ($bonus_data['lp-status'] === 'TRUE') : ?>
                <div class="auth-user-info">
                    <div class="user-avatar"><?php echo esc_html($initials); ?></div>
                    <div class="user-details">
                        <span class="user-name"><?php echo esc_html($name_to_use); ?></span>
                        <div class="user-points">
                        <b>Баланс: </b>
                            <?php echo esc_html($bonus_data['total_points'] ?? 0); ?> 
                            <img src="/wp-content/uploads/2025/05/android-icon-192x192-1.png" width="12" alt="Логотип" class="logo">
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="auth-user-info">
                    <div class="user-avatar"><?php echo esc_html(get_initials($display_name)); ?></div>
                    <div class="user-details">
                        <span class="user-name"><?php echo esc_html($display_name); ?></span>
                        <div class="auth-bonus-register">
                            <span class="user-email"><?php echo esc_html($email); ?></span>
                            <a href="/registraciya-v-bonusnoj-programme/" class="register-link">Присоединиться к программе</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <!-- Вывод меню WordPress -->
        <nav class="auth-user-menu">
            <?php 
            wp_nav_menu([
                'theme_location' => 'user-menu', 
                'container' => false,
                'menu_class' => 'user-menu',
                'fallback_cb' => false
            ]); 
            ?>
        </nav>
        
        <?php /* <a href="<?php echo wp_logout_url(home_url()); ?>" class="logout-button">Выйти</a> */?>
    <?php else : ?>
    <a href="<?php echo esc_url(home_url('/?sso_login=1')); ?>" class="button--sso">
        <span class="button__icon">
          <img class="button__icon--link" src="/wp-content/uploads/Profile.svg" alt="Profile Icon">
        </span>
        <span class="button__text">Войти</span>
    </a>
    <?php endif; ?>
    
    <?php
    return ob_get_clean();
}
add_shortcode('alean_auth', 'alean_auth_shortcode');

//-=-=-= Авторизация и пользователи =-=-=-//

function register_user_menu() {
    register_nav_menu('user-menu', 'Меню пользователя');
}
add_action('after_setup_theme', 'register_user_menu');

//===========










remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_template_single_price', 5);
















//-=-=-= WooCommerce настройки =-=-=-//

// Перемещаем цену в карточке товара
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_template_single_price', 5);

// Добавляем кастомный класс к заголовку "Цвет"
function add_custom_class_to_specific_heading($block_content, $block) {
    if ($block['blockName'] === 'core/heading' && 
        isset($block['attrs']['level']) && 
        $block['attrs']['level'] === 3 &&
        strpos($block_content, 'Цвет') !== false) {
        
        $block_content = str_replace(
            '<h3 class="wp-block-heading"',
            '<h3 class="wp-block-heading color-filter"',
            $block_content
        );
    }
    return $block_content;
}
add_filter('render_block', 'add_custom_class_to_specific_heading', 10, 2);





























add_filter('woocommerce_checkout_fields', 'add_phone_field_to_checkout');
function add_phone_field_to_checkout($fields) {
 
    $fields['billing']['billing_phone'] = array(
        'label'       => __('Phone', 'woocommerce'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'placeholder' => '+7 (___) ___-__-__',
        'default'     => WC()->session->get('cart_phone') ?: '',
    );
    return $fields;
}



add_action('woocommerce_cart_updated', 'save_cart_phone');
function save_cart_phone() {
    if (isset($_POST['cart_phone'])) {
        WC()->session->set('cart_phone', sanitize_text_field($_POST['cart_phone']));
    }
}


add_filter('woocommerce_checkout_get_value', 'transfer_phone_to_checkout', 10, 2);
function transfer_phone_to_checkout($value, $input) {
    if ($input === 'billing_phone') {
        $session_phone = WC()->session->get('cart_phone');
        return $session_phone ?: ($value ?: '+7 (');
    }
    return $value;
}









//-=-=-= Шорткоды =-=-=-//

function partners_benefits_shortcode() {
    ob_start();
    ?>
    <div class="partners__benefits benefits">
        <div class="benefits__item">
            <b class="h3 benefits__title">100</b>
            <span class="benefits__subtitle">блогеров</span>
            <div class="benefits__description">
                бесплатная реклама вашего отеля
            </div>
            <img
                decoding="async"
                loading="lazy"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/alean-orange.svg"
                alt="Иконка Alean (оранжевый)"
                class="benefits__icon animated slideFade"
            >
        </div>
        <div class="benefits__item">
            <b class="h3 benefits__title">20 тыс</b>
            <span class="benefits__subtitle">в Telegram</span>
            <div class="benefits__description">
                скорее сообщите им о своем отеле
            </div>
            <img
                decoding="async"
                loading="lazy"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/alean-pink.svg"
                alt="Иконка Alean (розовый)"
                class="benefits__icon animated slideFade"
            >
        </div>
        <div class="benefits__item benefits__item--wide">
            <b class="h3 benefits__title">500</b>
            <span class="benefits__subtitle">корпоративных партнеров</span>
            <div class="benefits__description">
                они могут разместиться именно в вашем отеле
            </div>
            <img
                decoding="async"
                loading="lazy"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/alean-gray.svg"
                alt="Иконка Alean (серый)"
                class="benefits__icon animated slideFade"
            >
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('partners_benefits', 'partners_benefits_shortcode');




//-=-=-= Подключение ресурсов =-=-=-//

function enqueue_swiper_assets() {
   
    if (!wp_script_is('swiper-js', 'registered')) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

function init_swiper_slider() {
    ?>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    
    if (typeof Swiper === 'undefined') {
        console.error('Swiper не загружен!');
        return;
    }


    const productContainers = document.querySelectorAll('.woocommerce.columns-4');

    productContainers.forEach(container => {
        const productsList = container.querySelector('ul.products');
        if (!productsList) return;

   
        productsList.classList.add('swiper-wrapper');
        productsList.querySelectorAll('li.product').forEach(item => {
            item.classList.add('swiper-slide');
        });

     
        const swiperContainer = document.createElement('div');
        swiperContainer.className = 'swiper';
        container.insertBefore(swiperContainer, productsList);
        swiperContainer.appendChild(productsList);

      
        new Swiper(swiperContainer, {
            slidesPerView: 'auto', 
            freeMode: true,       
            resistanceRatio: 0,    
            spaceBetween: 10,     
            mousewheel: false,       
            grabCursor: true,       
        });
    });
});
    </script>
    <?php
}
add_action('wp_footer', 'init_swiper_slider', 999);



 



function alean_styles() {
    wp_enqueue_style(
        'alean-main-css',
        get_template_directory_uri() . '/js/main.css',
        array('woocommerce-general'), 
        '1.0', // Версия
        'all' // Медиа-запрос
    );
}
add_action('wp_enqueue_scripts', 'alean_styles', 20); 


























// Добавляем кнопку "В корзину" в конце карточки товара в каталоге
add_action( 'woocommerce_after_shop_loop_item', 'astra_custom_add_to_cart_button', 99 );
function astra_custom_add_to_cart_button() {
    global $product;

 
    if ( ! $product || ! $product->is_purchasable() || ! $product->is_in_stock() ) {
        return;
    }

    // Стандартный шаблон WooCommerce для кнопки в цикле
    woocommerce_template_loop_add_to_cart();
}







add_filter('woocommerce_product_add_to_cart_text', function($text, $product) {
    if ($product->is_type('variable')) {
        return 'Выбрать вариант';
    }
    return 'В корзину';
}, 9999, 2);




//-=-=-= AJAX уведомления о добавлении в корзину =-=-=-//

// Настраиваем уведомления WooCommerce
// Включаем системные уведомления, но с кастомными стилями
add_filter('wc_add_to_cart_message_html', 'custom_add_to_cart_message_html', 10, 2);
add_filter('woocommerce_cart_redirect_after_error', '__return_false');

// Включаем AJAX для добавления в корзину на всех страницах
add_filter('woocommerce_loop_add_to_cart_link', 'add_ajax_to_cart_class', 10, 2);
function add_ajax_to_cart_class($link, $product) {
    // Добавляем класс ajax_add_to_cart для всех товаров
    $link = str_replace('add_to_cart_button', 'add_to_cart_button ajax_add_to_cart', $link);
    return $link;
}

// Обработчик AJAX добавления в корзину
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart() {
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX::get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        echo wp_send_json($data);
    }
    wp_die();
}

// Кастомная функция для уведомлений WooCommerce
function custom_add_to_cart_message_html($message, $products) {
    if (empty($products)) {
        return $message;
    }
    
    $titles = array();
    $count = 0;
    
    foreach ($products as $product_id => $quantity) {
        $titles[] = apply_filters('woocommerce_add_to_cart_item_name_in_quotes', sprintf(_x('"%s"', 'Item name in quotes', 'woocommerce'), strip_tags(get_the_title($product_id))), $product_id);
        $count += $quantity;
    }
    
    $titles = array_filter($titles);
    $added_text = sprintf(_n('%s has been added to your cart.', '%s have been added to your cart.', $count, 'woocommerce'), wc_format_list_of_items($titles));
    
    // Возвращаем HTML для системного уведомления WooCommerce
    return sprintf(
        '<div class="woocommerce-message woocommerce-message-success" role="alert">
            <div class="custom-notification" style="background: white; color: black; border: 2px solid #4CAF50; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); margin: 10px 0; position: relative;">
                <span style="color: #4CAF50; font-weight: bold;">✓</span> %s
                <a href="%s" class="button wc-forward" style="float: right; background: #4CAF50; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-size: 12px;">%s</a>
            </div>
        </div>',
        esc_html($added_text),
        esc_url(wc_get_cart_url()),
        esc_html__('View cart', 'woocommerce')
    );
}

// Кастомизируем ошибки WooCommerce
add_filter('woocommerce_add_to_cart_validation', 'custom_add_to_cart_validation', 10, 5);
function custom_add_to_cart_validation($passed, $product_id, $quantity, $variation_id = '', $variations = '') {
    if (!$passed) {
        // Добавляем кастомное сообщение об ошибке
        wc_add_notice(
            sprintf(
                '<div class="custom-notification" style="background: white; color: #f44336; border: 2px solid #f44336; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); margin: 10px 0;">
                    <span style="color: #f44336; font-weight: bold;">✗</span> %s
                </div>',
                esc_html__('Product could not be added to cart. Please check the product details.', 'woocommerce')
            ),
            'error'
        );
    }
    return $passed;
}

// Добавляем JavaScript для AJAX уведомлений
add_action('wp_footer', 'ajax_cart_notifications_script');
function ajax_cart_notifications_script() {
    if (is_admin()) return;
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Создаем контейнер для уведомлений если его нет
        if ($('#cart-notifications').length === 0) {
            $('body').append('<div id="cart-notifications" style="position:fixed;top:20px;right:20px;z-index:9999;"></div>');
        }

        // Функция показа уведомления
        function showCartNotification(message, type = 'success') {
            // Создаем контейнер для уведомлений, если его нет
            if ($('#cart-notifications').length === 0) {
                $('body').append('<div id="cart-notifications" style="position:fixed;top:20px;right:20px;z-index:9999;max-width:350px;"></div>');
            }
            
            // Определяем стили в зависимости от типа уведомления
            let styles = '';
            if (type === 'success') {
                styles = 'background: white; color: black; border: 2px solid #4CAF50;';
            } else if (type === 'error') {
                styles = 'background: white; color: #f44336; border: 2px solid #f44336;';
            } else {
                styles = 'background: white; color: black; border: 2px solid #2196F3;';
            }
            
            const notification = $('<div class="cart-notification cart-notification-' + type + '" style="' + styles + 'padding:15px 20px;margin-bottom:10px;border-radius:8px;box-shadow:0 4px 15px rgba(0,0,0,0.15);animation:slideIn 0.4s ease;max-width:350px;word-wrap:break-word;font-size:14px;font-weight:500;position:relative;overflow:hidden;">' + message + '</div>');
            
            $('#cart-notifications').append(notification);
            
            // Добавляем обработчик клика для закрытия
            notification.on('click', function() {
                $(this).fadeOut(300, function() {
                    $(this).remove();
                });
            });
            
            // Автоматически скрываем через 4 секунды
            setTimeout(function() {
                notification.fadeOut(400, function() {
                    $(this).remove();
                });
            }, 4000);
        }

        // Добавляем CSS анимацию и стили
        if ($('#cart-notification-styles').length === 0) {
            $('head').append('<style id="cart-notification-styles">
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
                .cart-notification {
                    cursor: pointer;
                    transition: all 0.3s ease;
                }
                .cart-notification:hover {
                    transform: translateX(-5px);
                    box-shadow: 0 6px 20px rgba(0,0,0,0.2) !important;
                }
                .cart-notification::before {
                    content: "";
                    position: absolute;
                    left: 0;
                    top: 0;
                    bottom: 0;
                    width: 4px;
                    background: inherit;
                }
                .cart-notification::after {
                    content: "×";
                    position: absolute;
                    right: 10px;
                    top: 50%;
                    transform: translateY(-50%);
                    font-size: 18px;
                    font-weight: bold;
                    opacity: 0.7;
                    cursor: pointer;
                }
                .cart-notification:hover::after {
                    opacity: 1;
                }
                
                /* Стили для системных уведомлений WooCommerce */
                .woocommerce-message .custom-notification {
                    background: white !important;
                    color: black !important;
                    border: 2px solid #4CAF50 !important;
                    padding: 15px 20px !important;
                    border-radius: 8px !important;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.15) !important;
                    margin: 10px 0 !important;
                    position: relative !important;
                    font-size: 14px !important;
                    font-weight: 500 !important;
                }
                
                .woocommerce-error .custom-notification {
                    background: white !important;
                    color: #f44336 !important;
                    border: 2px solid #f44336 !important;
                }
                
                .woocommerce-info .custom-notification {
                    background: white !important;
                    color: black !important;
                    border: 2px solid #2196F3 !important;
                }
                
                /* Скрываем стандартные уведомления WooCommerce */
                .woocommerce-message:not(.woocommerce-message-success),
                .woocommerce-error:not(.woocommerce-error-custom),
                .woocommerce-info:not(.woocommerce-info-custom) {
                    display: none !important;
                }
                
                /* Стили для кнопки закрытия */
                .close-notice {
                    transition: opacity 0.3s ease;
                }
                .close-notice:hover {
                    opacity: 1 !important;
                }
                
                /* Позиционирование для системных уведомлений */
                .woocommerce-message,
                .woocommerce-error,
                .woocommerce-info {
                    position: relative !important;
                    padding-right: 40px !important;
                }
            </style>');
        }
        
        // Обработка системных уведомлений WooCommerce
        function processWooCommerceNotifications() {
            // Обрабатываем успешные уведомления
            $('.woocommerce-message:not(.processed)').each(function() {
                var $notice = $(this);
                $notice.addClass('processed');
                
                // Дублируем в всплывающее уведомление
                var text = $.trim($notice.text());
                if (text) {
                    showCartNotification(text, 'success');
                }
                
                // Добавляем кнопку закрытия
                if (!$notice.find('.close-notice').length) {
                    $notice.append('<span class="close-notice" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);cursor:pointer;font-size:18px;font-weight:bold;opacity:0.7;">×</span>');
                }
                
                // Обработчик закрытия
                $notice.find('.close-notice').on('click', function() {
                    $notice.fadeOut(300, function() {
                        $(this).remove();
                    });
                });
                
                // Автоматически скрываем через 5 секунд
                setTimeout(function() {
                    if ($notice.is(':visible')) {
                        $notice.fadeOut(400, function() {
                            $(this).remove();
                        });
                    }
                }, 5000);
            });
            
            // Обрабатываем ошибки
            $('.woocommerce-error:not(.processed)').each(function() {
                var $notice = $(this);
                $notice.addClass('processed');
                
                // Дублируем в всплывающее уведомление
                var text = $.trim($notice.text());
                if (text) {
                    showCartNotification(text, 'error');
                }
                
                // Добавляем кнопку закрытия
                if (!$notice.find('.close-notice').length) {
                    $notice.append('<span class="close-notice" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);cursor:pointer;font-size:18px;font-weight:bold;opacity:0.7;">×</span>');
                }
                
                // Обработчик закрытия
                $notice.find('.close-notice').on('click', function() {
                    $notice.fadeOut(300, function() {
                        $(this).remove();
                    });
                });
                
                // Автоматически скрываем через 8 секунд (ошибки показываем дольше)
                setTimeout(function() {
                    if ($notice.is(':visible')) {
                        $notice.fadeOut(400, function() {
                            $(this).remove();
                        });
                    }
                }, 8000);
            });
        }
        
        // Запускаем обработку уведомлений при загрузке страницы
        processWooCommerceNotifications();
        
        // Обрабатываем новые уведомления, которые могут появиться динамически
        $(document.body).on('added_to_cart', function() {
            setTimeout(processWooCommerceNotifications, 100);
        });
        
        // Обрабатываем уведомления каждые 2 секунды (для динамически добавленных)
        setInterval(processWooCommerceNotifications, 2000);

        // Обработчик для кнопок добавления в корзину в каталоге
        $(document).on('click', '.ajax_add_to_cart', function(e) {
            e.preventDefault();
            
            var $thisbutton = $(this);
            var $form = $thisbutton.closest('form.cart');
            var id = $thisbutton.val();
            var product_qty = $form.find('input[name=quantity]').val() || 1;
            var product_id = $form.length ? $form.find('input[name=product_id]').val() || id : id;
            var variation_id = $form.find('input[name=variation_id]').val() || 0;

            var data = {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: product_id,
                product_sku: '',
                quantity: product_qty,
                variation_id: variation_id,
            };

            $thisbutton.removeClass('added').addClass('loading');

            // Trigger event
            $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

            $.post(wc_add_to_cart_params.ajax_url, data, function(response) {
                if (!response) {
                    return;
                }

                var this_page = window.location.toString();
                this_page = this_page.replace('add-to-cart', 'added-to-cart');

                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                }

                // Показываем уведомление об успешном добавлении
                var productName = $thisbutton.closest('.product').find('.woocommerce-loop-product__title').text() || 'Товар';
                showCartNotification('✓ ' + productName + ' добавлен в корзину!', 'success');

                // Обновляем фрагменты корзины
                if (response.fragments) {
                    $.each(response.fragments, function(key, value) {
                        $(key).replaceWith(value);
                    });
                }

                $thisbutton.addClass('added').removeClass('loading');

                // Trigger event
                $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                
            }).fail(function() {
                showCartNotification('Ошибка при добавлении товара в корзину', 'error');
                $thisbutton.removeClass('loading');
            });

            return false;
        });

        // Обработчик для страницы товара
        $('form.cart').on('submit', function(e) {
            var $form = $(this);
            var $submitButton = $form.find('button[type="submit"]');
            
            // Только если это AJAX запрос
            if ($submitButton.hasClass('single_add_to_cart_button') && !$form.hasClass('no-ajax')) {
                e.preventDefault();
                
                var formData = $form.serialize();
                formData += '&action=woocommerce_ajax_add_to_cart';
                
                $submitButton.addClass('loading').prop('disabled', true);
                
                $.post(wc_add_to_cart_params.ajax_url, formData, function(response) {
                    if (!response) {
                        return;
                    }

                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    }

                    // Показываем уведомление
                    var productName = $('.product_title').text() || 'Товар';
                    showCartNotification('✓ ' + productName + ' добавлен в корзину!', 'success');

                    // Обновляем фрагменты корзины
                    if (response.fragments) {
                        $.each(response.fragments, function(key, value) {
                            $(key).replaceWith(value);
                        });
                    }

                    $submitButton.removeClass('loading').prop('disabled', false);
                    
                }).fail(function() {
                    showCartNotification('Ошибка при добавлении товара в корзину', 'error');
                    $submitButton.removeClass('loading').prop('disabled', false);
                });
            }
        });
    });
    </script>
    <?php
}

/**
 * Исправление проблем с виджетом фильтра WooCommerce
 */

// Добавляем CSP заголовки для разрешения Web Worker'ов
add_action('wp_headers', 'add_csp_headers_for_woocommerce_blocks');
function add_csp_headers_for_woocommerce_blocks() {
    if (!is_admin()) {
        $csp_directives = array(
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://*.googleapis.com https://*.gstatic.com blob:",
            "worker-src 'self' blob: data:",
            "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://*.googleapis.com https://*.gstatic.com",
            "img-src 'self' data: blob: https:",
            "font-src 'self' https://cdn.jsdelivr.net https://*.googleapis.com https://*.gstatic.com",
            "connect-src 'self' https: wss:",
            "frame-src 'self' https:",
            "object-src 'none'",
            "base-uri 'self'"
        );
        
        $csp_header = 'Content-Security-Policy: ' . implode('; ', $csp_directives);
        header($csp_header);
    }
}

// Убеждаемся, что WooCommerce REST API доступен
add_action('init', 'ensure_woocommerce_rest_api_available');
function ensure_woocommerce_rest_api_available() {
    if (class_exists('WooCommerce')) {
        // Проверяем, что REST API включен
        if (!get_option('permalink_structure')) {
            update_option('permalink_structure', '/%postname%/');
        }
        
        // Убеждаемся, что WooCommerce Blocks поддерживаются
        if (!class_exists('Automattic\WooCommerce\Blocks\Package')) {
            // Если WooCommerce Blocks не установлен, выводим предупреждение
            add_action('admin_notices', function() {
                echo '<div class="notice notice-warning is-dismissible">';
                echo '<p><strong>Внимание:</strong> Для корректной работы виджетов фильтра необходимо установить плагин WooCommerce Blocks.</p>';
                echo '</div>';
            });
        }
    }
}

// Исправляем проблему с загрузкой фильтров WooCommerce
add_action('wp_enqueue_scripts', 'fix_woocommerce_blocks_loading');
function fix_woocommerce_blocks_loading() {
    if (class_exists('WooCommerce') && !is_admin()) {
        // Добавляем скрипт для исправления загрузки фильтров
        wp_add_inline_script('wc-blocks-registry', '
            // Исправление для загрузки фильтров WooCommerce
            document.addEventListener("DOMContentLoaded", function() {
                // Ждем загрузки WooCommerce Blocks
                if (typeof wc && wc.blocksRegistry) {
                    // Проверяем доступность маршрутов
                    if (wc.blocksRegistry.hasRoute && !wc.blocksRegistry.hasRoute("/wc/store/v1")) {
                        console.warn("WooCommerce REST API недоступен. Проверьте настройки постоянных ссылок.");
                        
                        // Показываем сообщение пользователю
                        const filterWrappers = document.querySelectorAll(".wp-block-woocommerce-filter-wrapper");
                        filterWrappers.forEach(function(wrapper) {
                            const loadingElement = wrapper.querySelector(".is-loading");
                            if (loadingElement) {
                                loadingElement.innerHTML = "<p style=\'color: #d63638;\'>Ошибка загрузки фильтра. Обновите страницу.</p>";
                                loadingElement.classList.remove("is-loading");
                            }
                        });
                    }
                }
            });
        ');
    }
}

// Добавляем поддержку CORS для WooCommerce REST API
add_action('rest_api_init', 'add_woocommerce_cors_support');
function add_woocommerce_cors_support() {
    if (class_exists('WooCommerce')) {
        // Добавляем CORS заголовки для WooCommerce REST API
        add_filter('rest_pre_serve_request', function($value) {
            header('Access-Control-Allow-Origin: ' . get_site_url());
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: Content-Type, X-WP-Nonce, Authorization');
            return $value;
        });
    }
}

// Проверяем и исправляем настройки WooCommerce
add_action('admin_init', 'check_woocommerce_settings');
function check_woocommerce_settings() {
    if (class_exists('WooCommerce')) {
        // Проверяем настройки постоянных ссылок
        if (get_option('permalink_structure') === '') {
            add_action('admin_notices', function() {
                echo '<div class="notice notice-error is-dismissible">';
                echo '<p><strong>Критическая ошибка:</strong> WooCommerce требует настройки постоянных ссылок. Перейдите в <a href="' . admin_url('options-permalink.php') . '">Настройки > Постоянные ссылки</a> и выберите любой вариант кроме "Обычные".</p>';
                echo '</div>';
            });
        }
        
        // Проверяем, что WooCommerce REST API включен
        if (!get_option('woocommerce_api_enabled')) {
            update_option('woocommerce_api_enabled', 'yes');
        }
    }
}

// Подключаем файл диагностики WooCommerce
if (file_exists(get_template_directory() . '/woocommerce-debug.php')) {
    require_once get_template_directory() . '/woocommerce-debug.php';
}

// Удаляем нежелательные уведомления про Яндекс Плюс
add_filter('woocommerce_get_notices', 'alean_filter_unwanted_notices', 10, 1);
function alean_filter_unwanted_notices($all_notices) {
	if (empty($all_notices) || !is_array($all_notices)) {
		return $all_notices;
	}
	foreach ($all_notices as $type => $items) {
		if (!is_array($items)) {
			continue;
		}
		$kept = array();
		foreach ($items as $item) {
			$text = is_array($item) && isset($item['notice']) ? wp_strip_all_tags($item['notice']) : (string) $item;
			// Фильтруем сообщения, содержащие упоминания Яндекс Плюс/Подписка Яндекс
			if (preg_match('/яндекс\s*плюс|подписк[а-я]+\s*яндекс/iu', $text)) {
				continue;
			}
			$kept[] = $item;
		}
		$all_notices[$type] = $kept;
	}
	return $all_notices;
}
































