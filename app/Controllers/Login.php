<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        echo view('user/login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $valid_pass = password_verify($password, $data->password);
            if($valid_pass){
                $session->set([
                    'id' => $data->id,
                    'name' => $data->full_name,
                    'email' => $data->email,
                    'is_admin' => $data->is_admin
                ]);
                return redirect()->to('/dashboard');
            } else{
                $session->setFlashData('msg', 'Wrong Password!');
                return redirect()->to('/login');
            } 
        } else{
            $session->setFlashdata('msg', 'Email not found.');
            return redirect()->to('/login');
        }
    }
}
