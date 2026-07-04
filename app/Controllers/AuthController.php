<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        $request = service('request');

        $login = trim((string) $request->getPost('email'));
        $password = (string) $request->getPost('password');

        // Normalisasi email ke huruf kecil
        $email = mb_strtolower($login);

        // Validasi input kosong
        if ($email === '' || $password === '') {
            // Sebaiknya tambahkan session flashdata untuk memunculkan pesan error di view
            return view('login');
        }

        $model = new UserModel();
        // Gunakan lower() di SQL jika ingin pencarian lebih aman dari perbedaan huruf kapital
        $user = $model->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()
            ->with('error', 'Email atau password salah');
        }
        // Jika user tidak ditemukan
        if (!$user) {
        return redirect()->back()
        ->with('error', 'Email tidak ditemukan');
        }

        // Verifikasi password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()
            ->with('error', 'Password salah');
        }

        // --- BERHASIL LOGIN ---
        // 1. Simpan data user ke Session terlebih dahulu agar halaman dashboard tahu siapa yang login
        $session = session();
        $session->set([
            'id_user'   => $user['id_user'],
            'nama'      => $user['nama'],
            'email' => $user['email'],
            'role'      => $user['role'],
            'isLoggedIn'=> true
        ]);

        // 2. Redirect ke route dashboard 
        return redirect()->to(base_url('dashboard')); 
        $routes->get('/dashboard', 'DashboardController::index');
    }
}