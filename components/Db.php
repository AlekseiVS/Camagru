<?php

class Db{
    public  static function  getConnection(){
        $paramsPatch = ROOT.'/config/database.php';
        $params = include($paramsPatch);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        $db->exec("set name utf8");
        return $db;
    }
}
?>