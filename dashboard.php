<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

use App\Auth\Auth;
use App\Auth\Credentials;
use App\Student\Gender;

$auth = new Auth(new Credentials());

if (!$auth->check()) {
    redirect('login.php');
}

$user = $auth->user();
$genders = Gender::values();
$perPage = STUDENTS_PER_PAGE;
$title = 'Data Student';

require __DIR__ . '/views/dashboard.php';
