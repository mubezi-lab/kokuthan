<?php
namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function connect()
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../../config/database.php';

            try {
                self::$instance = new PDO(
                    "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
                    $config['username'],
                    $config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
