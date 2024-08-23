<?php
use Core\Database;
use Core\Validator;

$config = require base_path("config.php");

$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];

    $query = "INSERT INTO notes(body, user_id) VALUES(:body, :user_id)";

    if(!Validator::string($_POST['body'], 1, 1000)){
        $errors['body'] = 'A body of no more than 1000 characters is required';
    }

    if(empty($errors)){
        $db->query($query, [
            'body' => $_POST['body'], 
            'user_id' => 1
        ]);
    }
}
$heading = "Create Note";
view("notes/create.view.php", [
    "heading" => "Create note"
]);