<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');




$routes->get('login', 'Login::index');
$routes->get('login/forgot_password', 'Login::forgotPassword');



$routes->get('dashboard', 'Dashboard::index');
$routes->get('dashboard/admin', 'Dashboard\AdminView::index');
$routes->get('dashboard/employee', 'Dashboard\EmployeeView::index');

