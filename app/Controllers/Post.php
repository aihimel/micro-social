<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostModel;

class Post extends Controller
{
    public function index()
    {
        $postModel = new PostModel();
        $postModel->insert([
            'title' => 'Sample Post',
            'status' => "A detailed Status",
        ]);
        echo 'Post Controller.';
    }
}
