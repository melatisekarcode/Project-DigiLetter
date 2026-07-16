<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDosenFileToPengajuanSurat extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pengajuan_surat', [
            'id_dosen' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id_jenis',
            ],
            'file_surat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'nama file PDF yang tersimpan di server',
                'after'      => 'tujuan_surat',
            ],
        ]);

        // Foreign key ke tabel users untuk id_dosen (dosen penandatangan)
        $this->forge->addForeignKey('id_dosen', 'users', 'id_user', 'CASCADE', 'SET NULL', 'pengajuan_surat_id_dosen_foreign');
        $this->forge->processIndexes('pengajuan_surat');
    }

    public function down()
    {
        $this->forge->dropForeignKey('pengajuan_surat', 'pengajuan_surat_id_dosen_foreign');
        $this->forge->dropColumn('pengajuan_surat', ['id_dosen', 'file_surat']);
    }
}