<?php
use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::email($email)){
    $errors['email'] = 'Please enter a valid email address';
}

if(!Validator::string($password, 7, 255)){
    $errors['password'] = 'Your password should be at least 7 characters long';
}

if(!empty($errors)){
    return view('auth/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
$query = "SELECT * FROM users WHERE email = :email";

$user = $db->query($query, [':email' => $email])->find();

if($user){
    header('location: /auth/login');
    exit();
}else {
    $db->query("INSERT into users(email, password) VALUES(:email, :password)", [':email' => $email, ':password' => password_hash($password, PASSWORD_BCRYPT)]);

    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}