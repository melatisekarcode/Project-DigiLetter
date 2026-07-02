<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // View `index` tidak ada di app/Views, sehingga halaman root gagal dirender.
        // Gunakan view `login` agar sesuai alur aplikasi.
        return view('login');
    }

    public function dashboard(): string
    {
        return view('dashboard');
    }

    public function logout()
    {
        // logout sederhana: hapus session jika ada
        $session = session();
        if (is_object($session) && method_exists($session, 'destroy')) {
            $session->destroy();
        }

        return view('login');
    }


}


