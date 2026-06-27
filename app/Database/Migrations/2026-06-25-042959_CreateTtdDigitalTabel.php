<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTtdDigitalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ttd' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pengajuan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_dosen' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true, // Merujuk ke id_user di tabel users dengan role dosen
            ],
            'tanggal_ttd' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status_ttd' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'disetujui', 'ditolak'],
                'default'    => 'menunggu',
            ],
        ]);

        $this->forge->addKey('id_ttd', true);
        
        // Relasi / Foreign Keys
        $this->forge->addForeignKey('id_pengajuan', 'pengajuan_surat', 'id_pengajuan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_dosen', 'users', 'id_user', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('ttd_digital');
    }

    public function down()
    {
        $this->forge->dropTable('ttd_digital');
    }
}