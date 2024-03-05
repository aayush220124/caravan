<?php

namespace App\Controllers\User\Auth;

use CodeIgniter\HTTP\ResponseInterface;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class AuthController extends BaseController
{
    public function login()
    {
        return view('user/auth/login');
    }

    public function signup()
    {
        return view('user/auth/signup');
    }

    public function dashboard()
    {
        return view('user/auth/userdashboard');
    }

    public function loginHandeler()
    {
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->to(route_to('user.loginPage'))->withInput()->with('alert-danger', 'Invalid email or password');
        }

        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set('user_id', $user['id']);
            $session->set('email', $user['email']);

            return redirect()->to(route_to('user.dashboard'));
        } else {
            return redirect()->to(route_to('user.loginPage'))->with('alert-danger', 'Invalid email or password');
        }
    }

    public function signupHandler()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'The {field} is registred with use used diffrent email.'
                ]
            ],
            'mobile' => [
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'numeric' => 'The {field} field must contain only numbers.',
                    'exact_length' => 'The {field} field must be exactly 10 digits long.'
                ]
            ],
            'username' => 'required|min_length[6]|max_length[20]|alpha_numeric',
            'password' => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // If validation passes, proceed with registration
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model = new UserModel();
        $model->insert($data);

        $user = $model->where('email', $data['email'])->first();

        $session = session();
        $session->set('user_id', $user['id']);
        $session->set('email', $user['email']);

        return redirect()->to(route_to('user.dashboard'))->with('alert-success', 'Account created successfully. Welcome!');
    }


    public function logout()
    {
        $session = session();
        $session->remove('user_id');
        $session->remove('email');
        $session->destroy();

        return redirect()->to(route_to('user.loginPage'))->with('alert-success', 'You have been logged out successfully.');
    }
}
