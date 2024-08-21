<?php
require "Database.php";
require "functions.php";

// require "router.php";

$db = new Database();
$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

dump_and_die($posts);



