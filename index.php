<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

use App\Auth\Auth;
use App\Auth\Credentials;

$auth = new Auth(new Credentials());

redirect($auth->check() ? 'dashboard.php' : 'login.php');
