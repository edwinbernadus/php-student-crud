<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

use App\Auth\Auth;
use App\Auth\Credentials;

$auth = new Auth(new Credentials());

if ($auth->check()) {
    redirect('dashboard.php');
}

$username = DEFAULT_USERNAME;
$error = '';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $username = trim((string) ($_POST['username'] ?? ''));

    if ($auth->attempt($username, (string) ($_POST['password'] ?? ''))) {
        redirect('dashboard.php');
    }

    $error = 'Username atau password salah.';
    $username = $username === '' ? DEFAULT_USERNAME : $username;
}

$title = 'Masuk';
$prefillPassword = LOGIN_PASSWORD;

require __DIR__ . '/views/login.php';
