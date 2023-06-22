<?php

spl_autoload_register(function ($class) {
    if (strpos($class, "DAO") !== false) {
        require_once "models/dao/{$class}.php";
    } elseif (strpos($class, "Controller") !== false) {
        require_once "controllers/{$class}.php";
    } elseif (strpos($class, "Router") !== false) {
        require_once "routing/{$class}.php";
    } else {
        require_once "models/entities/{$class}.php";
    }
});
