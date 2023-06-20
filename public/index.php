<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// // $animal = new Animal();
// // var_dump($animal);

include('../autoload.php');
$router = new Router($_SERVER["REQUEST_URI"]);