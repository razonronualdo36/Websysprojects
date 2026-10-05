<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

$routes->get('/welcome', 'Tasks::home');

$routes->get('/tasks', 'Tasks::index');

$routes->get('/profile', 'Tasks::profile');

$routes->get('/about', 'Pages::about');