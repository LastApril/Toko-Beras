<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\model_users;

class Login extends BaseController
{
    public function index()
    {
        echo view('login');
    }

    public function auth()
    {
        #echo view('welcome_message');
        $session = session();
        $model = new model_users();
        $request = \Config\Services::request();
        $username = $request->getPost('username');
        $password = $request->getPost('password');
        $data = $model->where('username', $username)->first();
        if($data){
            $pass = $data['password'];            
            if($password==$pass){
                $session_data = [
                    'username' => $data['username'],
                    'nama' => $data['nama'],
                    'login' => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('/');
            }else{
                $session->setFlashdata('message', 'Salah Password');
                echo 'Salah password';
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('message', 'Salah Username');
            echo 'Salah username';
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}