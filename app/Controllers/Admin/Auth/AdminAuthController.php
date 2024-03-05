<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\AdminModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class AdminAuthController extends BaseController
{
    public function login()
    {
        return view('admin/auth/login');
    }

    public function dashboard()
    {
        return view('admin/dashboard/dashboard');
    }

    public function loginHandeler()
    {
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->to(route_to('admin.loginPage'))->withInput()->with('alert-danger', 'Invalid email or password');
        }
        $model = new AdminModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $model->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session = session();
            $session->set('admin_id', $admin['id']);
            $session->set('admin_email', $admin['email']);

            return redirect()->to(route_to('admin.dashboard'));
        } else {
            return redirect()->to(route_to('admin.loginPage'))->with('alert-danger', 'Invalid email or password');
        }
    }
}
