<?php

use controllers\JudgeController;
use controllers\PersonController;
use controllers\SportController;

require '../controllers/JudgeController.php';
require '../controllers/SportController.php';

$judgeController = new JudgeController();
$sportController = new SportController();

$baseUri = dirname($_SERVER['SCRIPT_NAME']);
$requestUri = str_replace($baseUri, '', $_SERVER['REQUEST_URI']);
$requestUri = rtrim($requestUri, '/');
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '' || $requestUri === '/') {
    $judgeController->index();
} elseif ($requestUri === '/judges' && $requestMethod === 'GET') {
    $judgeController->index();
} elseif ($requestUri === '/judges/create' && $requestMethod === 'GET') {
    $judgeController->create();
} elseif ($requestUri === '/judges' && $requestMethod === 'POST') {
    $judgeController->store();
} elseif (preg_match('/^\/judges\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET') {
    $judgeController->show($matches[1]);
} elseif (preg_match('/^\/judges\/(\d+)\/edit$/', $requestUri, $matches) && $requestMethod === 'GET') {
    $judgeController->edit($matches[1]);
} elseif (preg_match('/^\/judges\/(\d+)\/update$/', $requestUri, $matches) && $requestMethod === 'POST') {
    $judgeController->update($matches[1]);
} elseif (preg_match('/^\/judges\/(\d+)\/delete$/', $requestUri, $matches) && $requestMethod === 'POST') {
    $judgeController->delete($matches[1]);


} elseif ($requestUri === '/sports' && $requestMethod === 'GET') {
    $sportController->index();
} elseif ($requestUri === '/sports/create' && $requestMethod === 'GET') {
    $sportController->create();
} elseif ($requestUri === '/sports' && $requestMethod === 'POST') {
    $sportController->store();
} elseif (preg_match('/^\/sports\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET') {
    $sportController->show($matches[1]);
} elseif (preg_match('/^\/sports\/(\d+)\/edit$/', $requestUri, $matches) && $requestMethod === 'GET') {
    $sportController->edit($matches[1]);
} elseif (preg_match('/^\/sports\/(\d+)\/update$/', $requestUri, $matches) && $requestMethod === 'POST') {
    $sportController->update($matches[1]);
} elseif (preg_match('/^\/sports\/(\d+)\/delete$/', $requestUri, $matches) && $requestMethod === 'POST') {
    $sportController->delete($matches[1]);


} else {
    echo "Page not found";
}