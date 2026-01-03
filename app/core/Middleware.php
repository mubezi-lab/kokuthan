<?php
namespace App\Core;

class Middleware
{
    public static function auth()
    {
        if (!Auth::check()) {
            // mtu hajalogin → rudisha login page
            header("Location: /kokuthan/public/");
            exit;
        }
    }

    public static function role(array $roles)
    {
        if (!Auth::check()) {
            header("Location: /kokuthan/public/");
            exit;
        }

        $userRole = Auth::role(); // role halisi ya user

        if (!in_array($userRole, $roles)) {
            http_response_code(403);
            echo "403 - Huna ruhusa ya kufungua ukurasa huu";
            exit;
        }
    }
}
