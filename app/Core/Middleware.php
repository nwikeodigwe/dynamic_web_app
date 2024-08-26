<?php

namespace Core;

class Middleware {
    const USER = 'user';
    const GUEST = 'guest';

     public function user(){
        
        
     }

     public function guest(){
        if(!$_SESSION['logged_in'] ?? false){
            header('location: /auth/login');
            exit();
        }
     }
}