<?php

function dump_and_die($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function is_url($value) {
   return $_SERVER["REQUEST_URI"] === $value;
}

function abort($code = 404){
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

function route_to_controller($url, $routes){
    if(array_key_exists($url, $routes)) {
        require $routes[$url];
    }else {
        abort();
    }
}