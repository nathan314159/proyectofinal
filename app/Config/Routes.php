<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('register/mostarUsuarios', 'register\registerController::index');
$routes->get('register', 'register\registerController::register');
$routes->post('register', 'register\registerController::register');

$routes->get('login', 'auth\AuthUserController::loginForm');
$routes->post('login', 'auth\AuthUserController::login');
$routes->get('mensaje/success', function() {return view('mensaje/success');
});
$routes->post('register/delete', 'register\registerController::delete');
$routes->post('register/edit', 'register\registerController::delete');