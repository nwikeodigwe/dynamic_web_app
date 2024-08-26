<?php

namespace Core\Middleware;

class Guest {
    
    public function handle(){
        if(!$_SESSION['logged_in'] ?? false){
            header('location: /auth/login');
            exit();
        }
    }
}