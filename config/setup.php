<?php
$paramsPatch = 'database.php';
$params = include($paramsPatch);

//var_dump($params);

$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

try {
    $db = new PDO('mysql:host=localhost;', $params['user'], $params['password']);
    $sql = "CREATE DATABASE IF NOT EXISTS " . $params['dbname'];
    $db->exec($sql);

    $db = new PDO($dsn, $params['user'], $params['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = file_get_contents('../camagru.sql');
    $db->exec($sql);
}
catch (PDOException $exp){
    echo "Something go wrong " . $exp->getMessage();
}
?>

