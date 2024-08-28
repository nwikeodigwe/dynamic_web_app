<?php
namespace Core;

class Session {
    const ERROR = '_flash';

    public static function put($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null){
        return $_SESSION[self::ERROR][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value){
        $_SESSION[self::ERROR][$key] = $value;
    }

    public static function unflash(){
        $_SESSION[self::ERROR] = [];
    }

    public static function destroy(){
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}