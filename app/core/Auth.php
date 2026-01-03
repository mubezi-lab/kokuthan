<?php
namespace App\Core;

class Auth
{
    /**
     * Angalia kama user ame-login
     * @return bool
     */
    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * Rudisha taarifa za user aliye-login
     * @return array|null
     */
    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    /**
     * Rudisha role ya user aliye-login
     * @return string|null
     */
    public static function role(): ?string
    {
        return $_SESSION['user']['role'] ?? null;
    }

    /**
     * Logout user
     */
    public static function logout(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}
