<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

use App\Auth\Auth;
use App\Auth\Credentials;

(new Auth(new Credentials()))->logout();

redirect('login.php');
