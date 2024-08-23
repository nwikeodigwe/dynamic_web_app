<?php
use Core\Database;
use Core\Validator;


$config = require base_path("config.php");

$db = new Database($config['database']);

$errors = [];

if(!Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body of no more than 1000 characters is required';
}

if(empty($errors)){
    $query = "INSERT INTO notes(body, user_id) VALUES(:body, :user_id)";
    $db->query($query, [
        ':body' => $_POST['body'], 
        ':user_id' => 1
    ]);

    header('location: /notes');
    die();
}else {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}
