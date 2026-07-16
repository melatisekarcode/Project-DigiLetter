<?php
namespace App\Controllers;

use App\Models\JenisSuratModel;
use App\Models\UserModel;

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
    $model = new JenisSuratModel();

    $data['jenis_surat'] = $model->findAll();
    $userModel = new UserModel();

    $data['dosen'] = $userModel->getDosen();

    return view('dashboard/mahasiswa', $data);
}
}