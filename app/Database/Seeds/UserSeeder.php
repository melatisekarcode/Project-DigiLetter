<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'       => 'Admin Akademik',
                'email'      => 'admin@kampus.ac.id',
                'password'   => password_hash('admin123', PASSWORD_BCRYPT),
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Dr. Robert Downey',
                'email'      => 'robert.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Zaky',
                'email'      => 'zaky.mhs@kampus.ac.id',
                'password'   => password_hash('mahasiswa123', PASSWORD_BCRYPT),
                'role'       => 'mahasiswa',
                'created_at' => date('Y-m-d H:i:s'),
            ],
             [
                'nama'       => 'Yanto Hermawan, S.T, M.Kom.',
                'email'      => 'yanto.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Marwan Effendy, S.Kom., MMSI',
                'email'      => 'marwan.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Ade Mulyana, S.SI., M.Kom.',
                'email'      => 'ade.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Wahyu Indra Satria, S.Kom., M.Kom.',
                'email'      => 'wahyu.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Rahma Djati Kusuma, S.SI., M.T.',
                'email'      => 'rahma.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Egi Adithia Pradana, S.Kom., M.Kom.',
                'email'      => 'egi.dosen@kampus.ac.id',
                'password'   => password_hash('dosen123', PASSWORD_BCRYPT),
                'role'       => 'dosen',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        $this->db->table('users')->insertBatch($data);
    }
}