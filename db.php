<?php
/**
 * This file is used for connecting to the database MYSQL
 * learningphppdo
 */
$dbname = "learningphppdo";
$dbhost="localhost";
$dbuser="root";
$dbpass="";
try{
    /*
     * having port and charset it optional
     * required are hostname, dbname
     * remote access may require port,
     * charset may be omited
     */
    $dsn="mysql:host={$dbhost};port=3306;dbname={$dbname};charset=utf8";
    $dsn="mysql:host={$dbhost};dbname={$dbname}";
    $connection = new PDO($dsn,$dbuser,$dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo $e->getMessage();
    die("<br>Connection Error</br>");
}
