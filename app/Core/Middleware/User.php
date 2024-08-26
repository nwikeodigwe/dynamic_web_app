<?php

namespace Core\Middleware;

class User {
    const STATUS = 'user';

    public function handle(){
        if($_SESSION['logged_in'] ?? false){
            header('location: /notes');
            exit();
        }
    }
}