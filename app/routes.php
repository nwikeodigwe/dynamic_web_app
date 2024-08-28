<?php
use Core\Middleware\Middleware;

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/notes', 'notes/index.php')->only(Middleware::USER);
$router->post('/notes', 'notes/store.php');

$router->get('/note/create', 'notes/create.php');
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->get('/auth/register', 'auth/create.php')->only(Middleware::GUEST);
$router->post('/auth/register', 'auth/store.php');

$router->get('/auth/login', 'auth/sessions/create.php')->only(Middleware::GUEST);
$router->post('/auth/login', 'auth/sessions/store.php')->only(Middleware::GUEST);

$router->delete('/auth/logout', 'auth/sessions/destroy.php')->only(Middleware::USER);

