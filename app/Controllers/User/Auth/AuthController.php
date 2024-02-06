<?php

namespace App\Controllers\User\Auth;

use CodeIgniter\HTTP\ResponseInterface;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Controller;

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
            return redirect()->to('/auth/login')->withInput()->with('error', 'Invalid email or password');
        }

        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set('user_id', $user['id']);
            $session->set('username', $user['username']);

            return redirect()->to(route_to('user.dashboard'));
        } else {
            return redirect()->to(route_to('user.loginPage'))->with('error', 'Invalid email or password');
        }
    }

    public function signupHandeler()
    {
        $validationRules = [
            'username' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'mobile' => 'required',
            'password' => 'required|min_length[8]'
        ];

        $validationErrors = [
            'email' => [
                'is_unique' => 'The email address is already registered.'
            ]
        ];

        if (!$this->validate($validationRules, $validationErrors)) {
            return redirect()->to('/auth/signup')->withInput()->with('error', 'Please correct the errors below.');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'mobile'    => $this->request->getPost('mobile'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model = new UserModel();
        $model->insert($data);

        $user = $model->where('email', $data['email'])->first();

        $session = session();
        $session->set('user_id', $user['id']);
        $session->set('username', $user['username']);

        return redirect()->to(route_to('user.dashboard'))->with('success', 'Account created successfully. Welcome!');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(route_to('user.loginPage'))->with('success', 'You have been logged out successfully.');
    }
}
