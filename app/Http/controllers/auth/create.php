<?php
use Core\Session;

view('auth/create.view.php', [
    'errors' => Session::get('errors')
]);