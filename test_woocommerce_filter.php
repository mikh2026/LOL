<?php
/**
 * Тестовый файл для проверки работы фильтра WooCommerce
 * 
 * Этот файл можно использовать для диагностики проблем с фильтром
 */

// Проверяем, загружен ли WordPress
if (!defined('ABSPATH')) {
    // Если файл запущен напрямую, загружаем WordPress
    require_once('../../../wp-load.php');
}

// Проверяем, загружен ли WooCommerce
if (!function_exists('WC')) {
    echo '<div style="color: red; padding: 20px; border: 1px solid red; margin: 20px;">';
    echo '<h3>Ошибка: WooCommerce не загружен</h3>';
    echo '<p>Плагин WooCommerce не активен или не установлен.</p>';
    echo '</div>';
    exit;
}

// Проверяем основные компоненты WooCommerce
echo '<div style="padding: 20px; border: 1px solid #ccc; margin: 20px;">';
echo '<h2>Диагностика фильтра WooCommerce</h2>';

// Проверка объекта WC
if (WC()) {
    echo '<p style="color: green;">✓ Объект WC загружен</p>';
} else {
    echo '<p style="color: red;">✗ Объект WC не загружен</p>';
}

// Проверка объекта query
if (WC()->query) {
    echo '<p style="color: green;">✓ Объект WC->query доступен</p>';
} else {
    echo '<p style="color: red;">✗ Объект WC->query недоступен</p>';
}

// Проверка настроек фильтрации
$filter_settings = get_option('woocommerce_default_catalog_orderby');
echo '<p><strong>Настройка сортировки по умолчанию:</strong> ' . ($filter_settings ?: 'не установлена') . '</p>';

// Проверка активных виджетов
echo '<h3>Проверка виджетов фильтрации:</h3>';

$widgets = array(
    'woocommerce_layered_nav' => 'Фильтр по атрибутам',
    'woocommerce_price_filter' => 'Фильтр по цене',
    'woocommerce_product_categories' => 'Категории товаров',
    'woocommerce_product_tag_cloud' => 'Облако тегов'
);

foreach ($widgets as $widget_id => $widget_name) {
    if (is_active_widget(false, false, $widget_id)) {
        echo '<p style="color: green;">✓ ' . $widget_name . ' - активен</p>';
    } else {
        echo '<p style="color: red;">✗ ' . $widget_name . ' - не активен</p>';
    }
}

// Проверка хуков WooCommerce
echo '<h3>Проверка хуков WooCommerce:</h3>';

$hooks = array(
    'woocommerce_before_shop_loop' => 'Перед циклом товаров',
    'woocommerce_after_shop_loop' => 'После цикла товаров',
    'woocommerce_before_shop_loop_item' => 'Перед элементом товара',
    'woocommerce_after_shop_loop_item' => 'После элемента товара'
);

foreach ($hooks as $hook => $description) {
    $callbacks = has_action($hook);
    if ($callbacks) {
        echo '<p style="color: green;">✓ ' . $description . ' - ' . $callbacks . ' callback(s)</p>';
    } else {
        echo '<p style="color: orange;">⚠ ' . $description . ' - нет callback\'ов</p>';
    }
}

// Проверка текущей страницы
echo '<h3>Информация о текущей странице:</h3>';
echo '<p><strong>Тип страницы:</strong> ';
if (is_shop()) {
    echo 'Магазин';
} elseif (is_product_category()) {
    echo 'Категория товаров';
} elseif (is_product_tag()) {
    echo 'Тег товаров';
} elseif (is_product()) {
    echo 'Страница товара';
} elseif (is_cart()) {
    echo 'Корзина';
} elseif (is_checkout()) {
    echo 'Оформление заказа';
} else {
    echo 'Другая страница';
}
echo '</p>';

// Проверка запроса WooCommerce
if (WC()->query && WC()->query->get_main_query()) {
    echo '<p style="color: green;">✓ Основной запрос WooCommerce активен</p>';
    
    $query_vars = WC()->query->query_vars;
    if (!empty($query_vars)) {
        echo '<p><strong>Переменные запроса:</strong></p>';
        echo '<ul>';
        foreach ($query_vars as $key => $value) {
            if (!empty($value)) {
                echo '<li>' . $key . ': ' . (is_array($value) ? implode(', ', $value) : $value) . '</li>';
            }
        }
        echo '</ul>';
    }
} else {
    echo '<p style="color: red;">✗ Основной запрос WooCommerce не активен</p>';
}

// Проверка уведомлений
echo '<h3>Проверка уведомлений WooCommerce:</h3>';
if (function_exists('wc_get_notices')) {
    $notices = wc_get_notices();
    if (!empty($notices)) {
        echo '<p><strong>Активные уведомления:</strong></p>';
        foreach ($notices as $type => $messages) {
            echo '<p><strong>' . $type . ':</strong></p>';
            echo '<ul>';
            foreach ($messages as $message) {
                $text = is_array($message) ? $message['notice'] : $message;
                echo '<li>' . htmlspecialchars($text) . '</li>';
            }
            echo '</ul>';
        }
    } else {
        echo '<p style="color: green;">✓ Нет активных уведомлений</p>';
    }
} else {
    echo '<p style="color: red;">✗ Функция wc_get_notices недоступна</p>';
}

echo '</div>';

// Добавляем кнопку для тестирования фильтра
echo '<div style="padding: 20px; margin: 20px;">';
echo '<h3>Тестирование фильтра:</h3>';
echo '<p>Для тестирования фильтра перейдите на страницу магазина и попробуйте:</p>';
echo '<ul>';
echo '<li>Изменить сортировку товаров</li>';
echo '<li>Использовать фильтр по цене</li>';
echo '<li>Выбрать категорию товаров</li>';
echo '<li>Применить фильтр по атрибутам</li>';
echo '</ul>';
echo '<p><a href="' . get_permalink(wc_get_page_id('shop')) . '" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px;">Перейти в магазин</a></p>';
echo '</div>';
?>