<?php

//namespace app\components;

class Router{

    private $routes; //Масив в котором будут хранится маршруты

    public function __construct(){
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    //Return request string -- Метод возвращает строку (http://mysite/запрос)
    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    //Метод run будет принимать управление от фронт контроллер ----
    //Это та часть которая отвечает за анализ запроса и передачу управления
    public  function run(){

        //Получить строку запроса
        $uri = $this->getURI();

//        echo $uri.'<br>';
        //Проверить наличие такого запроса в routes.php
        $res = false;

//        echo '<pre>';
//        var_dump($this->routes);
//        echo '</pre>';
        foreach ($this->routes as $uriPattern => $path) {

            //Сравнить (совпадения) $uriPattern и $uri

//            echo $uriPattern.'<br>';
//            echo $path.'<br>';
            if (preg_match("~$uriPattern~", $uri)){

                //Получаем внутренний путь из внешнего согласно правилу
//                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //Определить какой controllers и action обрабатывают запрос
//                $segments = explode('/', $internalRoute);

                $segments = explode('/', $path);

//                $url = trim($_SERVER['REQUEST_URI'], '-');


//                echo "<pre>";
//                var_dump($segments);
//                echo "</pre>";

                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

//                echo "<pre>";
//                var_dump($parameters);
//                echo "</pre>";

                //Подключить файл класса-контроллера
//                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
//
//                if (file_exists($controllerFile)){
//                    include_once ($controllerFile);
//                }

                //Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;

//                echo "<pre>";
//                print_r($controllerObject);
//                echo "</pre>";

//                $page = substr($uri, 13, 3);
//                $controllerObject->$actionName($page);

//                $result = $controllerObject->$actionName($parameters);
                call_user_func_array(array($controllerObject, $actionName), $parameters);
                $res = true;
                break;
            }
        }
        if ($res == false)
        {
            if (isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
                $user = User::getUserById($userId);
            }
            require_once(ROOT . '/views/site/error404.php');
        }

    }
}

?>
