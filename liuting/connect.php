<?php

$dsn    = "mysql:host = localhost;dbname = shopping";
$user   = "root";
$passwd = "root";

try {
    $pdo = new PDO ($dsn,"root","root");
} catch (Exception $e) {
	echo "error".$e->getMessage();
}


