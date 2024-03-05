<?php

namespace App\Controllers\User\Auth;

use App\Controllers\BaseController;
use App\Models\User\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ForgotPasswordController extends BaseController
{
    public function forgotPassword()
    {
        return view('user/auth/forgot-password');
    }

    public function enterOtp()
    {
        return view('user/auth/enter-otp');
    }

    public function newPassword()
    {
        return view('user/auth/new-password');
    }

    public function sendForgotOtp()
    {
        $validationRules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => 'Enter valid email id'
            ],
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->to(route_to('user.loginPage'))->withInput()->with('errors', 'Invalid email id');
        }

        $email = $this->request->getPost('email');

        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if ($user) {
            $digits = 6;
            $min = pow(10, $digits - 1);
            $max = pow(10, $digits) - 1;

            $otp = str_pad(random_int($min, $max), $digits, '0', STR_PAD_LEFT);

            // Store OTP in session with expiration time
            $session = session();
            $otpData = [
                'forgot-email' => $email,
                'otp' => $otp,
                'expires_at' => time() + (10 * 60) // Set expiration time 10 minutes from now
            ];

            // Load email library
            $emailLib = \Config\Services::email();

            // Set email parameters
            $emailLib->setTo($email);
            $emailLib->setFrom('webhost466@gmail.com', 'Carvan');
            $emailLib->setSubject('Carvan Forgot Password OTP');
            $emailLib->setMessage("Your OTP for password reset is: $otp");

            // Send email
            if ($emailLib->send()) {
                echo 'Email sent successfully.';
                $session->set('otp', $otpData);
                return redirect()->to(route_to('user.entertOtpPage'))->withInput()->with('alert-success', 'OTP is sent to your email.');
            } else {
                // echo 'Email could not be sent.';
                // echo '<pre>';
                // print_r($emailLib->printDebugger(['headers']));
                // echo '</pre>';
                return redirect()->to(route_to('user.forgotPassword'))->withInput()->with('alert-success', 'Something went wrong please try again!.');
            }
        } else {
            return redirect()->to(route_to('user.forgotPassword'))->withInput()->with('alert-danger', 'Enter email id is not registred with us.');
        }
    }

    public function verifyOtp()
    {
        $otpInput = $this->request->getPost('otp'); // Get OTP input from form

        // Retrieve OTP and expiration time from session
        $session = session();
        $otpData = $session->get('otp');

        // Check if OTP session exists and is not expired
        if ($otpData && isset($otpData['otp']) && isset($otpData['expires_at']) && $otpData['expires_at'] > time()) {
            $otpStored = $otpData['otp'];

            // Compare input OTP with stored OTP
            if ($otpInput === $otpStored) {
                // OTP is valid
                return redirect()->to(route_to('user.newPasswordPage'))->withInput()->with('alert-success', 'OTP verified successfully.');
            } else {
                // Invalid OTP
                return redirect()->to(route_to('user.entertOtpPage'))->withInput()->with('alert-danger', 'Please enter valid OTP.');
            }
        } else {
            // OTP session does not exist or has expired
            return redirect()->to(route_to('user.forgotPassword'))->withInput()->with('alert-danger', 'OTP expired please try again!.');
        }
    }

    public function newPasswordHandler()
    {
        $session = session();
        $otpData = $session->get('otp');

        // Check if OTP session exists and is not expired
        if (!$otpData || !isset($otpData['otp']) || !isset($otpData['forgot-email']) || !isset($otpData['expires_at']) || $otpData['expires_at'] <= time()) {
            // OTP session not found or expired
            return redirect()->to(route_to('user.forgotPassword'))->with('alert-danger', 'OTP session not found or expired. Please request a new OTP.');
        }

        // OTP session exists and is valid
        $email = $otpData['forgot-email'];
        $newPassword = $this->request->getPost('password');

        // Validate password and confirm password
        // $rules = [
        //     'password' => 'required|min_length[8]',
        //     'confirm_password' => 'required|matches[password]'
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        // Update user's password in the database
        $model = new UserModel();
        $user = $model->where('email', $email)->first();
        if (!$user) {
            // User not found with the provided email
            return redirect()->to(route_to('user.forgotPassword'))->with('alert-danger', 'User not found. Please try again.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $model->update($user['id'], ['password' => $hashedPassword]);

        // Password updated successfully, clear OTP session
        $session->remove('otp');

        // Redirect user to login page with success message
        return redirect()->to(route_to('user.loginPage'))->with('alert-success', 'Password updated successfully. You can now login with your new password.');
    }
}
