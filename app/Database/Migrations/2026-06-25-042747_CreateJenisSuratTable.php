<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisSuratTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('jenis_surat');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_surat');
    }
}