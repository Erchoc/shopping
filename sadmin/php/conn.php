<?php

$dsn  = 'mysql:host=localhost; dbname=shopping';
$user = 'root';
$pass = 'root';

try {
    $db = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'error'.$e->getMessage();
}

function newSession($param1, $param2)
{
	return md5($param1, $param2);
}