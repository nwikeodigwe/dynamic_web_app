<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForms {
   public $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = 'Please enter a valid email address';
        }

        if(!Validator::string($attributes['password'])){
            $this->errors['password'] = 'Please provide a valid password';
        }
    }

    public static function validate($attributes){
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw(): $instance;
    }

    protected function failed(){
        return count($this->errors);
    }

    public function throw(){
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public  function errors(){
        return $this->errors;
    }

    public function error($key, $message){
        $this->errors[$key] = $message;

        return $this;
    }
}
