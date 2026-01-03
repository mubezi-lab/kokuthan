<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

$db = Database::connect();
$stmt = $db->query("SELECT COUNT(*) AS total_users FROM users");

echo "<pre>";
print_r($stmt->fetch());
echo "</pre>";
