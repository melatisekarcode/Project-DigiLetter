<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jenis' => 'Perizinan',
            ],
            [
                'nama_jenis' => 'Pengajuan',
            ],
            [
                'nama_jenis' => 'Undangan',
            ],
             [
                'nama_jenis' => 'Peminjaman',
            ],
        ];

        $this->db->table('jenis_surat')->insertBatch($data);
    }
}