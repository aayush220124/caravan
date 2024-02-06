<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group('user', static function ($routes) {
    $routes->group('auth', ['namespace' => 'App\Controllers\User\Auth'], function ($routes) {
        $routes->add('login', 'AuthController::login', ['as' => 'user.loginPage']);
        $routes->add('signup', 'AuthController::signup', ['as' => 'user.signupPage']);
        $routes->add('dashboard', 'AuthController::dashboard', ['as' => 'user.dashboard']);

        $routes->post('login', 'AuthController::loginHandeler', ['as' => 'user.loginHandeler']);
        $routes->post('signup', 'AuthController::signupHandeler', ['as' => 'user.signupHandeler']);
        $routes->add('logout', 'AuthController::logout', ['as' => 'user.logoutHandeler']);
    });
});
