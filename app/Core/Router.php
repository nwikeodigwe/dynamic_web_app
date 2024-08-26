<?php
namespace Core;
use Core\Middleware\Middleware;


class Router {
    protected $routes = [];

    protected function add($method, $uri, $controller, $middleware = null){
        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');
        return $this;
    }
    public function get($uri, $controller){
        return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller){
        return $this->add('POST', $uri, $controller);
    }
    public function patch($uri, $controller){
        return $this->add('PATCH', $uri, $controller);
    }
    public function put($uri, $controller){
        return $this->add('PUT', $uri, $controller);
    }
    public function delete($uri, $controller){
        return $this->add('DELETE', $uri, $controller);
    }
    public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
                (new Middleware)->resolve($route['middleware']);
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }
    public function only($key){
        return $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        
    }
    protected function abort($code = 404){
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}

