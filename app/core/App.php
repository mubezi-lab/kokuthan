<?php
namespace App\Core;

class App
{
    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Handle subfolder
        $subfolder = '/kokuthan/public';
        if (strpos($uri, $subfolder) === 0) {
            $uri = substr($uri, strlen($subfolder));
        }

        if ($uri === '') {
            $uri = '/';
        }

        $routes = require __DIR__ . '/../../routes/web.php';

        if (!isset($routes[$uri])) {
            http_response_code(404);
            echo "404 - Page haipo (URI: $uri)";
            exit;
        }

        $route = $routes[$uri];

        /* =========================
           🔐 MIDDLEWARE HANDLING
        ========================== */
        if (isset($route['middleware'])) {
            foreach ($route['middleware'] as $middleware) {

                if ($middleware === 'auth') {
                    Middleware::auth();
                }

                if (str_starts_with($middleware, 'role:')) {
                    $roles = explode(',', str_replace('role:', '', $middleware));
                    Middleware::role($roles);
                }
            }
        }
        /* ========================= */

        $controllerClass = "App\\Controllers\\" . $route['controller'];

        if (!class_exists($controllerClass)) {
            http_response_code(500);
            echo "Controller $controllerClass haipo";
            exit;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $route['method'])) {
            http_response_code(500);
            echo "Method {$route['method']} haipo kwenye controller {$route['controller']}";
            exit;
        }

        $controller->{$route['method']}();
    }
}
