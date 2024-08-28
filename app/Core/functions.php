<?php
use Core\Response;

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

    require base_path("views/{$code}.php");

    die();
}

function route_to_controller($url, $routes){
    if(array_key_exists($url, $routes)) {
        require base_path($routes[$url]);
    }else {
        abort(Response::NOT_FOUND);
    }
}

function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attribute = []){
    extract($attribute);
    
    require base_path("views/{$path}");
}

function redirect($path){
    header("location: $path");
    exit();
}

function old($key, $default = ''){
    return Core\Session::get('old')[$key] ?? $default;
}