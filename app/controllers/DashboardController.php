<?php
// namespace App\Controllers;

// use App\Core\Controller;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         $role = $_SESSION['user']['role'];

//         $this->view("dashboards/$role");
//     }
// }





// namespace App\Controllers;

// use App\Core\Controller;
// use App\Core\Auth;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         $role = Auth::user()['role'];

//         $this->view("dashboards/$role");
//     }
// }





namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function admin()
    {
        $this->view('dashboard/admin'); // app/views/dashboard/admin.php
    }

    public function manager()
    {
        $this->view('dashboard/manager'); // app/views/dashboard/manager.php
    }

    public function employee()
    {
        $this->view('dashboard/employee'); // app/views/dashboard/employee.php
    }
}

