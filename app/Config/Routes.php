<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'options'],' /kuisioner', 'KuisionerControl::index');
$routes->match(['post', 'options'], '/kuisioner/simpanHasil', 'KuisionerControl::simpanHasil');
$routes->match(['get', 'options'], '/kuisioner/simpanHasil', 'KuisionerControl::simpanHasil');
$routes->match(['get', 'options'], '/kuisioner/hasil/(:num)', 'KuisionerControl::hasil/$1');
// $routes->get('/hasil-kuisioner/(:num)', 'KuisionerControl::read/$1');
$routes->get('/hasil-kuisioner', 'HasilKuisionerControl::index');