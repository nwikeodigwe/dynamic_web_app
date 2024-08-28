<?php
use Core\Authenticator;
use Http\Forms\LoginForms;
use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
];

$form = LoginForms::validate($attributes);

$auth = new Authenticator($attributes);

if($auth->user()){
    $form->error('email', 'User already exists for email provided')->throw();
}

$auth->register();
$auth->attempt();
$auth->login();
redirect('/');


