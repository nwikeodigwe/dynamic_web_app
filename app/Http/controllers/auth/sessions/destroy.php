<?php

use Core\Session;

Session::destroy();
header('location: /auth/login');
exit();