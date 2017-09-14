<?php

header('Content-Type: text/html; charset=utf-8');
require_once ("./conn.php");

session_start();

session_destroy();

header("location: ../login.html");
