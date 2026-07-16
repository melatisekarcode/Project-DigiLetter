<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Pengajuan extends BaseController
{
    public function store()
    {
        $file = $this->request->getFile('file_surat');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File gagal diupload');
        }

        if (strtolower($file->getExtension()) !== 'pdf') {
            return redirect()->back()->with('error', 'Harus file PDF');
        }

        $namaBaru = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $namaBaru);

        // Ambil id_user dari session
        $idUser = session()->get('id_user') ?? session()->get('user_id');

        if (!$idUser) {
            return redirect()->back()->with('error', 'Sesi pengguna tidak valid. Silakan login ulang.');
        }

        $model = new SuratModel();

        $model->save([
            'id_user'           => (int) $idUser,
            'id_jenis'          => (int) $this->request->getPost('jenis_surat'),
            'id_dosen'          => (int) $this->request->getPost('id_dosen'),
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'tujuan_surat'     => $this->request->getPost('tujuan_surat'),
            'file_surat'       => $namaBaru,
            'status'           => 'diajukan',
            'keterangan'       => $this->request->getPost('keterangan') ?? null,
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil');
    }
}

