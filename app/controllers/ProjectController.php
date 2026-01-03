<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    // List projects
    public function index()
    {
        $projectModel = new Project();
        $projects = $projectModel->all();

        $this->view('admin/projects/index', [
            'projects' => $projects
        ]);
    }

    // Save project
    public function store()
    {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (!$name) {
            $_SESSION['error'] = 'Jina la mradi linahitajika';
            $this->redirect('/dashboard/admin');
            return;
        }

        $projectModel = new Project();
        $projectModel->create([
            'name' => $name,
            'description' => $description
        ]);

        $_SESSION['success'] = 'Mradi umeongezwa kikamilifu';
        $this->redirect('/dashboard/admin');
    }
}
