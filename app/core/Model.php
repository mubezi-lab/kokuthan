<?php
// namespace App\Core;

// use PDO;

// class Model
// {
//     protected $db;

//     public function __construct()
//     {
//         $config = require __DIR__ . '/../../config/database.php';

//         $this->db = new PDO(
//             "mysql:host={$config['host']};dbname={$config['dbname']}",
//             $config['user'],
//             $config['pass'],
//             [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//         );
//     }
// }



namespace App\Core;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
}

