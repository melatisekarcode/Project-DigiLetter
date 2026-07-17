<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table            = 'pengajuan_surat'; 
    protected $primaryKey       = 'id_pengajuan';    
    protected $useAutoIncrement = true;

    // INI SANGAT PENTING: Kolom yang diizinkan untuk diisi
    protected $allowedFields    = [
        'id_user', 
        'id_jenis', 
        'tanggal_pengajuan', 
        'tujuan_surat', 
        'file_surat', 
        'status', 
        'keterangan'
    ];

    public function getRiwayatByUser($idUser)
    {
        return $this->db->table($this->table)
            // Pilih semua dari pengajuan_surat, dan nama_jenis dari jenis_surat
            ->select('pengajuan_surat.*, jenis_surat.nama_jenis')
            // Lakukan Join dengan tabel jenis_surat
            ->join('jenis_surat', 'jenis_surat.id_jenis = pengajuan_surat.id_jenis', 'left')
            // Filter hanya data milik user yang sedang login
            ->where('pengajuan_surat.id_user', $idUser)
            // Urutkan dari yang paling baru
            ->orderBy('pengajuan_surat.tanggal_pengajuan', 'DESC')
            ->get()
            ->getResultArray();
    }

    // ==========================================
    // MENGAMBIL DATA STATISTIK UNTUK DASHBOARD
    // ==========================================
    public function getStatistik($idUser = null)
    {
        $builder = $this->db->table($this->table);

        // Jika ada idUser (misal untuk dashboard mahasiswa), filter datanya
        if ($idUser !== null) {
            $builder->where('id_user', $idUser);
        }

        // Sesuaikan dengan nilai ENUM pada field status di database
        $builder->select('
            COUNT(id_pengajuan) as total,
            SUM(CASE WHEN status = "diajukan" THEN 1 ELSE 0 END) as diajukan,
            SUM(CASE WHEN status = "diproses" THEN 1 ELSE 0 END) as diproses,
            SUM(CASE WHEN status = "ditandatangani" THEN 1 ELSE 0 END) as ditandatangani,
            SUM(CASE WHEN status = "disampaikan" THEN 1 ELSE 0 END) as disampaikan,
            SUM(CASE WHEN status = "ditolak" THEN 1 ELSE 0 END) as ditolak
        ');

        return $builder->get()->getRowArray();
    }
}