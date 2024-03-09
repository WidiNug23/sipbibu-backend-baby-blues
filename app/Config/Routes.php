<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mood-tracker', 'MoodTrackerControl::index');
$routes->post('/mood-tracker/lihat-grafik', 'MoodTrackerControl::lihatGrafik');
$routes->get('/grafik-mood', 'GrafikControl::index');
