<?php

namespace App\Controllers;

use App\Models\PengajuanModel;

class Pengajuan extends BaseController
{
    public function store()
    {
        $file = $this->request->getFile('berkas_pdf');

        if (!$file->isValid()) {
            return redirect()->back()->with('error','File gagal diupload');
        }

        if ($file->getExtension() != 'pdf') {
            return redirect()->back()->with('error','Harus file PDF');
        }

        $namaBaru = $file->getRandomName();

        $file->move(WRITEPATH.'uploads', $namaBaru);

        $model = new PengajuanModel();

        $model->save([
            'id_jenis' => $this->request->getPost('jenis_surat'),
            'perihal' => $this->request->getPost('perihal'),
            'berkas_pdf' => $namaBaru
        ]);

        return redirect()->back()->with('success','Pengajuan berhasil');
    }
}