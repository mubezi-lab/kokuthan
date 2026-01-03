<?php
// namespace App\Controllers;

// use App\Core\Controller;
// use App\Models\User;

// class AdminUserController extends Controller
// {
//     public function store()
//     {
//         $fullName = trim($_POST['full_name'] ?? '');
//         $username = trim($_POST['username'] ?? '');
//         $password = $_POST['password'] ?? '';
//         $role     = $_POST['role'] ?? '';

//         // Basic validation
//         if (!$fullName || !$username || !$password || !$role) {
//             $_SESSION['error'] = "Tafadhali jaza taarifa zote";
//             $this->redirect('/dashboard/admin');
//             return;
//         }

//         if (strlen($password) < 6) {
//             $_SESSION['error'] = "Password iwe angalau herufi 6";
//             $this->redirect('/dashboard/admin');
//             return;
//         }

//         $userModel = new User();

//         // Check kama username ipo
//         if ($userModel->exists($username)) {
//             $_SESSION['error'] = "Username tayari inatumika";
//             $this->redirect('/dashboard/admin');
//             return;
//         }

//         // HASH PASSWORD (IMPORTANT)
//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//         $userModel->create([
//             'full_name' => $fullName,
//             'username'  => $username,
//             'password'  => $hashedPassword,
//             'role'      => $role
//         ]);

//         $_SESSION['success'] = "User ameongezwa kikamilifu";
//         $this->redirect('/dashboard/admin');
//     }

//     public function index()
//     {
//         $userModel = new User();
//         $users = $userModel->all();
//         $this->view('admin/users/index', [
//         'users' => $users
//         ]);
//     }

// }







namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\UserProjectRole;

class AdminUserController extends Controller
{
    // Store new user
    public function store()
    {
        $fullName = trim($_POST['full_name'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $role     = $_POST['role'] ?? '';

        // Basic validation
        if (!$fullName || !$username || !$password || !$role) {
            $_SESSION['error'] = "Tafadhali jaza taarifa zote";
            $this->redirect('/dashboard/admin');
            return;
        }

        if (strlen($password) < 6) {
            $_SESSION['error'] = "Password iwe angalau herufi 6";
            $this->redirect('/dashboard/admin');
            return;
        }

        $userModel = new User();

        // Check kama username ipo
        if ($userModel->exists($username)) {
            $_SESSION['error'] = "Username tayari inatumika";
            $this->redirect('/dashboard/admin');
            return;
        }

        // HASH PASSWORD (IMPORTANT)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel->create([
            'full_name' => $fullName,
            'username'  => $username,
            'password'  => $hashedPassword,
            'role'      => $role
        ]);

        $_SESSION['success'] = "User ameongezwa kikamilifu";
        $this->redirect('/dashboard/admin');
    }

    // User List / User Management Page
    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();

        $projectModel = new Project();
        $projects = $projectModel->all(); // Hii itasaidia modal dropdown

        $this->view('admin/users/index', [
            'users' => $users,
            'projects' => $projects
        ]);
    }

    // Get current project-role for user (AJAX)
    // public function getAccess()
    // {
    //     $user_id = $_GET['user_id'] ?? null;
    //     if (!$user_id) {
    //         echo json_encode([]);
    //         return;
    //     }

    //     $access = (new UserProjectRole())->getByUser($user_id);
    //     echo json_encode($access);
    // }

public function getAccess()
{
    $user_id = $_GET['user_id'] ?? null;

    if (!$user_id) {
        echo json_encode([]);
        return;
    }

    // $uprModel = new \App\Models\UserProjectRole();
    $uprModel = new UserProjectRole();
    $access = $uprModel->getByUser((int)$user_id);

    echo json_encode($access);
}

    


    // Save / Update project-role assignment (AJAX)
public function saveAccess()
{
    $user_id = $_POST['user_id'] ?? null;
    $project_id = $_POST['project_id'] ?? null;
    $role = $_POST['role'] ?? null;

    if (!$user_id || !$project_id || !$role) {
        echo json_encode(['success'=>false,'message'=>'Data incomplete']);
        return;
    }

    $uprModel = new UserProjectRole();
    $result = $uprModel->assign((int)$user_id, (int)$project_id, $role);

    echo json_encode($result);
}

}
