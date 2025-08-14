<?php
/**
 * Тестовый скрипт для проверки API системы баллов
 */

// Замените на реальный email пользователя для тестирования
$test_email = 'test@example.com'; // ЗАМЕНИТЕ НА РЕАЛЬНЫЙ EMAIL

echo "=== ТЕСТ API СИСТЕМЫ БАЛЛОВ ===\n";
echo "Email для тестирования: " . $test_email . "\n\n";

// Тестируем получение данных о баллах
$response = wp_remote_post(
    'https://n8n.alean.ru/webhook/get-lp-email',
    [
        'headers' => ['Content-Type' => 'application/json'],
        'body' => json_encode(['email' => $test_email]),
        'timeout' => 15
    ]
);

if (is_wp_error($response)) {
    echo "❌ ОШИБКА API: " . $response->get_error_message() . "\n";
    exit;
}

$body = wp_remote_retrieve_body($response);
echo "📨 RAW ОТВЕТ API:\n" . $body . "\n\n";

$data = json_decode($body, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "❌ ОШИБКА JSON: " . json_last_error_msg() . "\n";
    exit;
}

echo "📊 ОБРАБОТАННЫЕ ДАННЫЕ:\n";
echo "LP Status: " . ($data['lp-status'] ?? 'НЕ НАЙДЕН') . "\n";
echo "Total Points: " . ($data['total_points'] ?? 'НЕ НАЙДЕН') . "\n";

// Проверяем логику валидации
$lp_status = isset($data['lp-status']) ? strtoupper(trim($data['lp-status'])) : '';
$total_points = isset($data['total_points']) ? floatval($data['total_points']) : 0;

echo "\n🔍 РЕЗУЛЬТАТ ВАЛИДАЦИИ:\n";
echo "Нормализованный статус: '" . $lp_status . "'\n";
echo "Нормализованные баллы: " . $total_points . "\n";

if ($lp_status === 'TRUE') {
    echo "✅ Статус валиден\n";
} else {
    echo "❌ Статус НЕ валиден (ожидается 'TRUE', получен: '" . $lp_status . "')\n";
}

if ($total_points > 0) {
    echo "✅ Баллы найдены: " . $total_points . "\n";
} else {
    echo "❌ Баллы не найдены или равны 0\n";
}

echo "\n=== КОНЕЦ ТЕСТА ===\n";
?>