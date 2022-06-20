<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    // login form
    public function login()
    {
        $data = array();
        helper(['form']);
        $data['session'] = session();
        return view('user/login', $data);
    }

    // check login auth
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => true,
                ];
                $session->set($ses_data);
                return redirect()->to('/');

            } else {
                $session->setFlashdata('message', 'The Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('message', 'Invalid Email.');
            return redirect()->to('/login');
        }
    }

    // registration form
    public function register()
    {
        $data = array();
        helper(['form']);
        $data['session'] = session();
        return view('user/register', $data);
    }

    // save registration
    public function store()
    {
        helper(['form']);
        $rules = [
            'name' => ['label' => 'Name', 'rules' => 'required|min_length[2]|max_length[50]'],
            'email' => ['label' => 'Email', 'rules' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]', 'errors' => ['is_unique' => 'Email is already registered.']],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[4]|max_length[50]'],
            'confirmpassword' => ['label' => 'Confirm Password', 'rules' => 'matches[password]'],
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $userModel->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            $data['session'] = session();
            echo view('user/register', $data);
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
