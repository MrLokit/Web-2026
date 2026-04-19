<?php

/** API для загрузки картинок, сохраняет файл в папку /static */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Метод не поддерживается. Используйте POST.']);
    exit;
}

$input = file_get_contents('php://input');
if (empty($input)) {
    http_response_code(400);
    echo json_encode(['error' => 'Пустой запрос']);
    exit;
}

$data = json_decode($input, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => 'Неверный JSON']);
    exit;
}

if (!isset($data['image']) || empty($data['image'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Поле image отсутствует или пусто']);
    exit;
}

$imageBase64 = $data['image'];

if (strpos($imageBase64, 'base64,') !== false) {
    $imageBase64 = explode('base64,', $imageBase64)[1];
}

$imageData = base64_decode($imageBase64);
if ($imageData === false) {
    http_response_code(400);
    echo json_encode(['error' => 'Некорректная base64 строка']);
    exit;
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_buffer($finfo, $imageData);
finfo_close($finfo);

$extension = '';
switch ($mimeType) {
    case 'image/jpeg':
        $extension = 'jpg';
        break;
    case 'image/png':
        $extension = 'png';
        break;
    case 'image/gif':
        $extension = 'gif';
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Неподдерживаемый формат изображения. Только JPEG, PNG, GIF.']);
        exit;
}

$filename = uniqid('img_', true) . '.' . $extension;
$directory = __DIR__ . '/static/';

if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

$filePath = $directory . $filename;
if (file_put_contents($filePath, $imageData) === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Не удалось сохранить файл']);
    exit;
}

echo json_encode([
    'success' => true,
    'path' => '/static/' . $filename,
    'filename' => $filename
]);