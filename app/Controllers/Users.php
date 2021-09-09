<?php

namespace App\Controllers;

use App\Models\model_users;

class Users extends BaseController
{
    public function index()
    {
        $users = new model_users();
        $data['dt'] = $users->findAll();
        return view('users', $data);
    }

    public function add(){
        $validation =  \Config\Services::validation();
        $users = new model_users();
        $request = \Config\Services::request();

        $validation->setRules([
            'id'        => 'required',
            'username'  => 'required',
            'password'  => 'required',
            'nama'      => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $users->insert([
                'id'        => $request->getPost('id'),
                'username'  => $request->getPost('username'),
                'password'  => $request->getPost('password'),
                'nama'      => $request->getPost('nama')
            ]);
            return redirect()->to('/users');
        }
        echo view('add_users');
    }

    public function edit($id){
        $users = new model_users();
        $data['users'] = $users->where('id', $id)->first();
        $validation =  \Config\Services::validation();
        $request = \Config\Services::request();
        $validation->setRules([
            'id'        => 'required',
            'username'  => 'required',
            'password'  => 'required',
            'nama'      => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $users->update($id, [
                'username'  => $request->getPost('username'),
                'password'  => $request->getPost('password'),
                'nama'      => $request->getPost('nama')
            ]);
            return redirect()->to('/users');
        }
        echo view('edit_users', $data);
    }

    public function delete($id){
        $users = new model_users();
        $users->delete($id);
        return redirect()->to('/users');
    }

}