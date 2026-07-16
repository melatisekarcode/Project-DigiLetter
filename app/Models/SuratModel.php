<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table            = 'pengajuan_surat';
    protected $primaryKey       = 'id_pengajuan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = false; // tabel ini pakai kolom tanggal_pengajuan, bukan created_at

    protected $allowedFields = [
        'id_user',
        'id_jenis',
        'id_dosen',
        'tanggal_pengajuan',
        'tujuan_surat',
        'file_surat',
        'status',
        'keterangan',
    ];

    /**
     * Ambil daftar pengajuan surat milik satu mahasiswa, lengkap dengan nama jenis surat & nama dosen,
     * untuk ditampilkan di tabel Dashboard Utama.
     */
    public function getRiwayatByUser(int $idUser)
    {
        return $this->select('pengajuan_surat.*, jenis_surat.nama_jenis, users.nama AS nama_dosen')
            ->join('jenis_surat', 'jenis_surat.id_jenis = pengajuan_surat.id_jenis')
            ->join('users', 'users.id_user = pengajuan_surat.id_dosen', 'left')
            ->where('pengajuan_surat.id_user', $idUser)
            ->orderBy('pengajuan_surat.tanggal_pengajuan', 'DESC')
            ->findAll();
    }

    /**
     * Hitung ringkasan untuk 4 kartu statistik di Dashboard Utama.
     * Status di tabel ini: diajukan, diproses, ditandatangani, disampaikan, ditolak.
     */
    public function getStatistik(int $idUser): array
    {
        $builder = $this->where('id_user', $idUser);

        return [
            'total'     => (clone $builder)->countAllResults(),
            // "Menunggu Review" mencakup status yang belum final
            'proses'    => (clone $builder)->whereIn('status', ['diajukan', 'diproses'])->countAllResults(),
            // "Telah Disetujui (TTD)" = sudah ditandatangani atau sudah disampaikan
            'disetujui' => (clone $builder)->whereIn('status', ['ditandatangani', 'disampaikan'])->countAllResults(),
            'ditolak'   => (clone $builder)->where('status', 'ditolak')->countAllResults(),
        ];
    }
}