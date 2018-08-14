<?php
function __autoload($class_name)
{
    $array_path = array(
        '/models/',
        '/components/',
        '/controllers/'
    );


    foreach ($array_path as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}

//namespace

//echo "autoload arg: " . $class_name;
//$nameParts = explode("\\", $class_name);
//$path = ROOT . "/" . $nameParts[1] . "/" . $nameParts[2] . ".php";
//echo "<br>path to class: " . $path;


//if (is_file($path)){
//    include_once $path;
//}

?>