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

    public function dashboard()
    {
        return view('user/auth/userdashboard');
    }

    public function loginHandeler()
    {
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
            // Failed login, redirect back to login page with an error message
            return redirect()->to('/auth/login')->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}
