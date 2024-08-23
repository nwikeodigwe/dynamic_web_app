<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$query = "select * from notes where user_id = 1";

$notes = $db->query($query)->findAll();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);