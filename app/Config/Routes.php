<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('register/mostarUsuarios', 'register\registerController::index');
$routes->get('register', 'register\registerController::register');
$routes->post('register', 'register\registerController::register');
