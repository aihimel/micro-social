<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{

    public function index()
    {
        require_once APPPATH . 'Libraries/vendor/autoload.php';

        // init configuration
        $clientID = '154197372619-61ljv12kjq635mc8i9u2jtklt3i7smb5.apps.googleusercontent.com';
        $clientSecret = 'mZL8saZ_gf2_sPVR_wYhAKJs';
        $redirectUri = 'http://localhost:8081/login/google_login';

        // create Client Request to access Google API
        $client = new \Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        $data = [];

        $data['auth_url'] = $client->createAuthUrl();

        echo view('user/login', $data);
    }

    /**
     * Google Login handler
    */
    public function google_login(){
        
        require_once APPPATH . 'Libraries/vendor/autoload.php';

        // init configuration
        $clientID = '154197372619-61ljv12kjq635mc8i9u2jtklt3i7smb5.apps.googleusercontent.com';
        $clientSecret = 'mZL8saZ_gf2_sPVR_wYhAKJs';
        $redirectUri = 'http://localhost:8081/login/google_login';

        // create Client Request to access Google API
        $client = new \Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");


        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            // print_r($_GET['code']);
            // print_r($token);
            $client->setAccessToken($token['access_token']);
        
            // get profile info
            $google_oauth = new \Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email =  $google_account_info->email;
            $name =  $google_account_info->name;
            echo $name;
            $session = session();
            $session->set([
                'id' => $token['access_token'],
                'name' => $name,
                'email' => $email,
            ]);

            return redirect()->to('/dashboard');


        } else return redirect()->to('/login');



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
