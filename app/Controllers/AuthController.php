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

        // Jika user tidak ditemukan
        if (!$user) {
            return view('login');
        }

        // Verifikasi password
        if (!password_verify($password, $user['password'])) {
            return view('login');
        }

        // --- BERHASIL LOGIN ---
        // 1. Simpan data user ke Session terlebih dahulu agar halaman dashboard tahu siapa yang login
        $session = session();
        $session->set([
            'id_user'   => $user['id_user'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
            'isLoggedIn'=> true
        ]);

        // 2. Redirect ke route dashboard (Hilangkan .html, arahkan ke URL/Route controller)
        return redirect()->to(base_url('dashboard')); 
    }
}