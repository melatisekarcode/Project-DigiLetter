<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengajuanSuratTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengajuan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_jenis' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_pengajuan' => [
                'type' => 'DATETIME',
            ],
            'tujuan_surat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['diajukan', 'diproses', 'ditandatangani', 'disampaikan', 'ditolak'],
                'default'    => 'diajukan',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_pengajuan', true);
        
        // Relasi / Foreign Keys
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jenis', 'jenis_surat', 'id_jenis', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('pengajuan_surat');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_surat');
    }
}