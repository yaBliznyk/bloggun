<?php
/**
 * @var \Lib\Base\App $app
 * @var \Lib\Base\Connection $conn
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

$app = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Connection содержит в себе запрос, ответ, формат ответа и многое другое
 * Сам процесс работы app->run сводится к постепенному изменению ответа в зависимости от запроса
 */
$conn = \Lib\Base\Connection::getInstance();
$conn = $app->run($conn);

/**
 * Выдаем ответ и закрываем приложение
 */
$conn->response();
$app->close();