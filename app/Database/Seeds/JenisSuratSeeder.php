<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jenis' => 'Surat Keterangan Aktif Kuliah',
                'deskripsi'  => 'Surat untuk menerangkan bahwa mahasiswa masih aktif kuliah pada semester berjalan.',
            ],
            [
                'nama_jenis' => 'Surat Pengantar Magang / PKL',
                'deskripsi'  => 'Surat pengantar resmi dari kampus untuk mengajukan magang di instansi/perusahaan.',
            ],
            [
                'nama_jenis' => 'Surat Izin Penelitian Skripsi',
                'deskripsi'  => 'Surat izin pengambilan data objek penelitian untuk keperluan skripsi/tugas akhir.',
            ],
             [
                'nama_jenis' => 'Surat Izin Program Kerja Sama UKM',
                'deskripsi'  => 'Surat izin untuk program kerja sama dengan unit kegiatan mahasiswa.',
            ],
        ];

        $this->db->table('jenis_surat')->insertBatch($data);
    }
}