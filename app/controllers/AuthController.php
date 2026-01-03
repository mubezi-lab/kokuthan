<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        $this->view('auth/login');
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = (new \App\Models\User())->attempt($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            $this->redirect('/dashboard/admin'); // adjust role logic if needed
            return;
        }

        $_SESSION['error'] = "Username au password si sahihi";
        $this->redirect('/');
    }

    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}
