<?php
// FRONT CONTROLLER

// Общие настройки ----- Отображение ошибок(Выключается после завершения работы проэкта)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__)); //Полный путь к файлу на диске
require_once (ROOT.'/components/Autoload.php');

$routes = new Router();
$routes->run();

?>