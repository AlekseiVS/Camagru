<?php
// FRONT CONTROLLER

// 1. Общие настройки ----- Отображение ошибок(Выключается после завершения работы проэкта)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__)); //Полный путь к файлу на диске
require_once (ROOT.'/components/Autoload.php');
//require_once (ROOT.'/components/Router.php');
//require_once (ROOT.'/components/Db.php');
//echo ROOT;



// 3. Установка соединения с БД


// 4. Вызов Router

//namespace
//use app\components\Router;

$routes = new Router();
$routes->run();

?>