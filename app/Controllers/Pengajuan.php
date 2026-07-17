<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Pengajuan extends BaseController
{
    public function store()
    {
        // 1. Validasi Input agar memastikan tidak ada data kosong yang lolos ke database
        $rules = [
            'jenis_surat'  => 'required',
            'tujuan_surat' => 'required',
            'keterangan'   => 'required' // Karena diisi otomatis lewat JavaScript gabungan dosen + catatan
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Semua formulir wajib diisi dengan benar.');
        }

        // 2. Proses Validasi & Upload File PDF
        $file = $this->request->getFile('file_surat');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->withInput()->with('error', 'File gagal diunggah.');
        }

        if (strtolower($file->getExtension()) !== 'pdf') {
            return redirect()->back()->withInput()->with('error', 'Format berkas harus berupa PDF.');
        }

        $namaBaru = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $namaBaru);

        // 3. Ambil id_user dari Session
        $idUser = session()->get('id_user') ?? session()->get('user_id');

        if (!$idUser) {
            return redirect()->back()->with('error', 'Sesi login habis. Silakan login kembali.');
        }

        // 4. Tangkap nilai jenis_surat (Pastikan di HTML sudah tertulis name="jenis_surat")
        $idJenis = $this->request->getPost('jenis_surat');

        $model = new SuratModel();

        $data = [
            'id_user'           => (int) $idUser,
            'id_jenis'          => (int) $idJenis, // Akan masuk ke kolom id_jenis di database
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'tujuan_surat'      => $this->request->getPost('tujuan_surat'),
            'file_surat'        => $namaBaru,
            'status'            => 'diajukan',
            'keterangan'        => $this->request->getPost('keterangan'),
        ];

        // 5. Eksekusi Simpan dengan Proteksi Error Database
        try {
            $model->insert($data);
            
            // Jika sukses, kembalikan ke dashboard utama Anda
            return redirect()->to(site_url())->with('success', 'Pengajuan surat berhasil dikirim!');
            
        } catch (\Exception $e) {
            // Jika terjadi error Foreign Key lagi, kita bongkar datanya di sini untuk mencari penyebabnya
            dd([
                'Pesan Kendala'     => 'Foreign Key Gagal. Nilai id_jenis tidak dikenali oleh database.',
                'Nilai id_jenis'    => $idJenis,
                'Data Lengkap'      => $data,
                'Solusi Pengecekan' => 'Buka phpMyAdmin, cek tabel `jenis_surat`. Apakah ada baris data yang memiliki id_jenis bernilai = ' . $idJenis . '?'
            ]);
        }
    }
}