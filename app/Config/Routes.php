<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Halaman utama (Menampilkan Form Login)
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::index');

$routes->post('login', 'AuthController::login');

$routes->get('dashboard', 'Home::dashboard');
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('logout', 'Home::logout');

// Proses Validasi Login (Saat tombol "Masuk Sistem" ditekan dengan method POST)
$routes->post('login', 'AuthController::login');

//Dashboard
$routes->get('dashboard/admin', 'Dashboard::admin');
$routes->get('dashboard/dosen', 'Dashboard::dosen');
$routes->get('dashboard/mahasiswa', 'Dashboard::mahasiswa');
$routes->post('mahasiswa/simpan', 'Pengajuan::store');
 
// Pengajuan Surat
$routes->post('mahasiswa/simpan', 'Pengajuan::store');
$routes->get('mahasiswa/surat-keluar', 'Pengajuan::suratKeluar');
$routes->get('dokumen/lihat/(:segment)', 'Pengajuan::lihatDokumen/$1');

// Proses Logout
$routes->get('logout', 'Home::logout');