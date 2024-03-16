<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mood-tracker', 'MoodTrackerControl::index');
$routes->post('/simpan-hasil-mood', 'MoodTrackerControl::simpanHasilMood');
$routes->get('/grafik-mood', 'GrafikControl::index');
$routes->get('/login', 'DataIbuControl::login');
$routes->post('/login', 'DataIbuControl::login');
$routes->get('/signup', 'DataIbuControl::signup');
$routes->post('/signup', 'DataIbuControl::signup');
$routes->get('/dashboard', 'DataIbuControl::dashboard');
$routes->get('/logout', 'DataIbuControl::logout');
$routes->get('/edit', 'DataIbuControl::edit');
$routes->post('/update', 'DataIbuControl::update'); // Tambahkan rute untuk update
