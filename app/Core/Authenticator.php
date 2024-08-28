<?php
namespace Core;

use Core\App;
use Core\Database;

class Authenticator {
    protected $db;
    protected $user = [];
    protected $errors = [];

    public function __construct(public array $attributes){
        $this->db = App::resolve(Database::class);
    }

    public function attempt($attributes = null){
        $attributes = $attributes ?? $this->attributes ?? null;
        $user = $this->user($attributes['email']);
        if(!$user){
            $this->errors['email'] = 'Invalid email address provided';
        }
        if($this->user($attributes['email']) && !password_verify($attributes['password'], $this->user['password'])){
            $this->errors['password'] = 'Invalid credentials provided';
        }

        return empty($this->errors);
    }

    public function login($email = null){
        $email = $email ?? $this->user['email'] ?? null;
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'logged_in' => true,
            'email' => $email
        ];

        session_regenerate_id(true);
    }

    public function register($attributes = null){
        $attributes = $attributes ?? $this->attributes ?? null;
        $hash = password_hash($attributes['password'], PASSWORD_BCRYPT);
        $this->db->query("INSERT into users(email, password) VALUES(:email, :password)", [':email' => $attributes['email'], ':password' => $hash]);
    }

    public function errors(){
        return $this->errors;
    }

    protected function error($field, $message){
        $this->errors[$field] = $message;
    }

    public function user($email = null){
        $email = $email ?? $this->attributes['email'] ?? null;
        $query = "SELECT * FROM users WHERE email = :email";
        $this->user = $this->db->query($query, [':email' => $email])->find();
        return (bool) $this->user;
    }
    
}