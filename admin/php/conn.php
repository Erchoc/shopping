<?php

try{
    $pdo = new PDO('mysql:host=localhost, dbname=shopping', 'root', '');
    echo 'ok';
} catch(PDOException $e) {
    echo $e->getMessage();
}