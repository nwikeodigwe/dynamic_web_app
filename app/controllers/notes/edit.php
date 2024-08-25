<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$query = "select * from notes where id = :id";

$note = $db->query($query, [":id" => $_GET['id']])->findOrFail();

authorize($note['user_id'] === 1);
view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "note" => $note
]);