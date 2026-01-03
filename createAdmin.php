<?php
// Run this once to create admin user
require_once __DIR__ . '/app/core/Database.php';

use App\Core\Database;

try {
    // Connect to DB
    $db = Database::connect();

    // Admin credentials
    $full_name = 'Mubezi Jackson';
    $username = 'admin';
    $password_plain = 'admin123'; // Badilisha password kama unataka
    $role = 'admin';

    // Hash the password
    $hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);

    // Check if admin already exists
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo "Admin user tayari ipo.\n";
        exit;
    }

    // Insert admin user
    $stmt = $db->prepare("INSERT INTO users (full_name, username, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$full_name, $username, $hashed_password, $role])) {
        echo "Admin user imeundwa kwa ufanisi!\n";
        echo "Username: $username\nPassword: $password_plain\n";
    } else {
        echo "Kuna tatizo kuunda admin user.\n";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
