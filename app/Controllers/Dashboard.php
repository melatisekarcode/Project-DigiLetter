<?php
namespace App\Controllers;

use App\Models\JenisSuratModel;
use App\Models\UserModel;
use App\Models\SuratModel;

class Dashboard extends BaseController
{
    public function admin()
    {
        $jenisSuratModel = new JenisSuratModel();
        $data['jenis_surat'] = $jenisSuratModel->findAll();
        return view('dashboard/admin', $data);
    }

    public function dosen()
    {
        $jenisSuratModel = new JenisSuratModel();
        $data['jenis_surat'] = $jenisSuratModel->findAll();
        return view('dashboard/dosen', $data);
    }

    public function mahasiswa()
    {
        $jenisSuratModel = new JenisSuratModel();
        $data['jenis_surat'] = $jenisSuratModel->findAll();

        $userModel = new UserModel();
        $data['dosen'] = $userModel->getDosen();

        // Data riwayat & statistik harus ambil dari tabel pengajuan_surat
        $idUser = session()->get('id_user') ?? session()->get('user_id');

        $suratModel = new SuratModel();
        $data['riwayat_surat'] = $idUser ? $suratModel->getRiwayatByUser((int) $idUser) : [];
        $data['statistik'] = $idUser ? $suratModel->getStatistik((int) $idUser) : [
            'total' => 0,
            'proses' => 0,
            'disetujui' => 0,
            'ditolak' => 0,
        ];

        // Mapping yang dipakai di view: menunggu, disetujui, ditolak
        $data['statistik']['menunggu'] = $data['statistik']['diproses'];

        return view('dashboard/mahasiswa', $data);
    }
}

