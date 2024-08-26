<?php
namespace Core\Middleware;

use Core\Middleware\User;
use Core\Middleware\Guest;

class Middleware {
    const GUEST = 'guest';
    const USER = 'user';

    const MAP = [
        self::GUEST=> Guest::class,
        self::USER => User::class,
        
    ];

    public function resolve($key){
        if(!$key){
            return;
        }

        $middleware = self::MAP[$key];

        if(!$middleware){
            throw new \Exception("No matching middleware found for $key");
        }

        (new $middleware)->handle();
    }
}