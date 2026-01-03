<?php
session_start();

// Simple autoloader
spl_autoload_register(function ($class) {
    // Only handle App namespace
    if (str_starts_with($class, 'App\\')) {
        // Remove 'App\' prefix
        $class = substr($class, 4);
        // Convert \ to / for folder structure
        $class = str_replace('\\', '/', $class);
        // Build full path relative to 'app' folder
        $file = __DIR__ . '/../app/' . $class . '.php';

        if (file_exists($file)) {
            require_once $file;
        } else {
            die("File $file not found for class $class");
        }
    }
});

// Run App
use App\Core\App;
$app = new App();
$app->run();
