<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jurusan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jurusan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'keterangan' => [
                'type'       => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_jurusan', true);
        $this->forge->createTable('jurusan');
    }

    public function down()
    {
        $this->forge->dropTable('jurusan');
    }
}