<?php



use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ProductController;

return [

    '/' => [
        'controller' => 'AuthController',
        'method' => 'showLogin'
    ],

    '/login' => [
        'controller' => 'AuthController',
        'method' => 'login'
    ],

    '/logout' => [
        'controller' => 'AuthController',
        'method' => 'logout'
    ],

    // Dashboard routes with middleware
    '/dashboard/admin' => [
        'controller' => 'DashboardController',
        'method' => 'admin',
        'middleware' => ['auth', 'role:admin']
    ],

    '/dashboard/manager' => [
        'controller' => 'DashboardController',
        'method' => 'manager',
        'middleware' => ['auth', 'role:manager']
    ],

    '/dashboard/employee' => [
        'controller' => 'DashboardController',
        'method' => 'employee',
        'middleware' => ['auth', 'role:employee']
    ],


    // route ya kuhifadhi user mpya
    '/admin/users/create' => [
        'controller' => 'AdminUserController',
        'method' => 'store',
        'middleware' => ['auth', 'role:admin']
    ],

    // route ya user list
    '/admin/users' => [
        'controller' => 'AdminUserController',
        'method' => 'index',
        'middleware' => ['auth', 'role:admin']
    ],



];
