<?php
use Core\Authenticator;
use Http\Forms\LoginForms;


$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
];
$form = LoginForms::validate($attributes);

$auth = new Authenticator($attributes);

$signed_in = $auth->attempt();

if(!$signed_in){
   $form->error('email', 'Invalid login credentails')->throw(); 
}

$auth->login();
redirect('/');


