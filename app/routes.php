<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/note/create', 'controllers/notes/create.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/auth/register', 'controllers/auth/create.php');
$router->post('/auth/register', 'controllers/auth/store.php');

