<?php

declare(strict_types=1);

namespace App\Auth;

class Credentials
{
    public function check(string $username, string $password): bool
    {
        if ($username === '' || $password === '') {
            return false;
        }

        return hash_equals(LOGIN_PASSWORD, $password);
    }
}
