<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostModel;
use App\Models\LocationModel;

class Post extends Controller
{
    /**
     * @details a page to show all checkins
    */
    public function index()
    {
        $post_model = new PostModel();
        $location_mode = new LocationModel();
        $data = [];
        $data['posts'] = $post_model->where('private', 0)
        ->orderBy('insertion_datetime', 'asc')
        ->findAll();
        $data['locations'] = $location_mode->findAll();
        echo view('post/index', $data);
    }

    /**
     * @details Saving checkins
    */
    public function save(){

        $data = [
            'status' => $this->request->getVar('status'),
            'title' => $this->request->getVar('title'),
            'location_id' => $this->request->getVar('location'),
            'private' => $this->request->getVar('private'),
            'user_id' => session()->get('id'),
        ];
        
        $model = new PostModel();
        $model->save($data);
        return redirect()->to('/dashboard');

    }
}
