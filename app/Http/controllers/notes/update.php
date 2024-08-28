<?php
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$query = "select * from notes where id = :id";
$note = $db->query($query, [':id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === 1);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if(!empty($errors)){
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$query = "update notes set body = :body where id = :id";
$db->query($query, [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');
die();