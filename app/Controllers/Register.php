<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller{
    

    public function index(){

        echo view('user/register');

    }

    public function save(){

        $model = new UserModel();

        $data = [
            'full_name' => $this->request->getVar('full_name'),
            'email' => $this->request->getVar('email'),
            'location' => $this->request->getVar('location'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $model->save($data);
        return redirect()->to('/login');

    }

}