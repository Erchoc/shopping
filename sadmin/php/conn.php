<?php

$dsn  = 'mysql:host=localhost, dbname=shopping';
$user = 'root';
$pass = 'root';

try {
    $db = new PDO($dsn, $user, $pass);
    echo "link db ok";
} catch (PDOException $e) {
    echo 'error'.$e->getMessage();
}