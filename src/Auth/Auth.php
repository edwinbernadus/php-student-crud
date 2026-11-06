<?php

declare(strict_types=1);

namespace App\Auth;

class Auth
{
    public function __construct(private readonly Credentials $credentials)
    {
    }

    public function attempt(string $username, string $password): bool
    {
        if (!$this->credentials->check($username, $password)) {
            return false;
        }

        session_regenerate_id(true);
        $_SESSION['user'] = $username;

        return true;
    }

    public function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public function user(): ?string
    {
        return $_SESSION['user'] ?? null;
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
    }
}
