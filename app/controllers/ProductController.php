<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Project;

class ProductController extends Controller
{
    public function index()
    {
        $products = (new Product())->all();
        $this->view('products/index', compact('products'));
    }

    public function create()
    {
        $projects = (new Project())->all();
        $this->view('products/create', compact('projects'));
    }

    public function store()
    {
        (new Product())->create($_POST);
        $this->redirect('/admin/products');
    }
}
