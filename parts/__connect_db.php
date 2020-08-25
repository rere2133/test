<?php

$db_host = "localhost";
// 如網域不同要打ip
$db_name = "mytest";
$db_user = "root";
$db_pass = "";

$dsn = "mysql:host={$db_host};dbname={$db_name}";

$pdo_option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
];
//連接資料庫的相關設定

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_option);

define('WEB_ROOT', '/test');
