<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Halaman utama (Menampilkan Form Login)
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::index');

$routes->post('login', 'AuthController::login');

$routes->get('dashboard', 'Home::dashboard');

$routes->get('logout', 'Home::logout');

// Proses Validasi Login (Saat tombol "Masuk Sistem" ditekan dengan method POST)
$routes->post('login', 'AuthController::login');

// Halaman Dashboard setelah sukses login
$routes->get('dashboard', 'Home::dashboard');

// Proses Logout
$routes->get('logout', 'Home::logout');