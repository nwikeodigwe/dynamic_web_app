<?php
use Core\Session;

view('auth/login.view.php', [
    'errors' => Session::get('errors')
]);