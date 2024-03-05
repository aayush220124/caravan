<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Home::home', ['as' => 'home']);
$routes->get('/about', 'Home::about', ['as' => 'about']);
$routes->get('/contact', 'Home::contact', ['as' => 'contact']);

$routes->group('user', static function ($routes) {
    $routes->group('auth', ['namespace' => 'App\Controllers\User\Auth'], function ($routes) {
        $routes->add('login', 'AuthController::login', ['as' => 'user.loginPage']);
        $routes->post('login', 'AuthController::loginHandeler', ['as' => 'user.loginHandeler']);

        $routes->add('signup', 'AuthController::signup', ['as' => 'user.signupPage']);
        $routes->post('signup', 'AuthController::signupHandler', ['as' => 'user.signupHandler']);

        $routes->add('forgot-password', 'ForgotPasswordController::forgotPassword', ['as' => 'user.forgotPassword']);
        $routes->post('send-otp', 'ForgotPasswordController::sendForgotOtp', ['as' => 'user.sendForgotOtp']);
        $routes->add('enter-otp', 'ForgotPasswordController::enterOtp', ['as' => 'user.entertOtpPage']);
        $routes->post('verify-otp', 'ForgotPasswordController::verifyOtp', ['as' => 'user.verifyOtp']);
        $routes->add('new-password', 'ForgotPasswordController::newPassword', ['as' => 'user.newPasswordPage']);
        $routes->post('new-password', 'ForgotPasswordController::newPasswordHandler', ['as' => 'user.newPasswordHandler']);

        $routes->add('logout', 'AuthController::logout', ['as' => 'user.logoutHandeler']);
    });

    // Routes for user dashboard
    $routes->group('dashboard', ['namespace' => 'App\Controllers\User\Auth', 'filter' => 'userauth'], function ($routes) {
        // Define your user dashboard routes here
        $routes->add('/', 'AuthController::dashboard', ['as' => 'user.dashboard']);
    });
});

// Admin Routes
$routes->group('admin', static function ($routes) {
    $routes->group('auth', function ($routes) {
        $routes->get('login', 'Admin\Auth\AdminAuthController::login', ['as' => 'admin.loginPage']);
        $routes->post('login', 'Admin\Auth\AdminAuthController::loginHandeler', ['as' => 'admin.loginHandeler']);
    });

    // Routes for user dashboard
    $routes->group('dashboard', ['filter' => 'adminauth'], function ($routes) {
        // Define your user dashboard routes here
        $routes->add('/', 'Admin\Auth\AdminAuthController::dashboard', ['as' => 'admin.dashboard']);

        $routes->add('carvans', 'Admin\ACarvanController::carvanListPage', ['as' => 'admin.carvanListPage']);

        $routes->add('carvans/registration', 'Admin\ACarvanController::carvanRegPage', ['as' => 'admin.carvanRegPage']);
        $routes->post('carvans/registration', 'Admin\ACarvanController::carvanRegHandeler', ['as' => 'admin.carvanRegHandeler']);

        $routes->add('carvans/edit/(:num)', 'Admin\ACarvanController::carvanEditPage/$1', ['as' => 'admin.carvanEditPage']);
        $routes->post('caravans/edit', 'Admin\ACarvanController::carvanEditHandeler', ['as' => 'admin.carvanEditHandeler']);

        $routes->get('caravans/delete/(:num)', 'Admin\ACarvanController::caravanDeleteHandeler/$1', ['as' => 'admin.caravanDeleteHandeler']);
    });
});
