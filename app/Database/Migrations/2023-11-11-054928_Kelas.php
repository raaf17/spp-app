<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'id_jurusan' => [
                'type' => 'INT',
                'constraint' => 5,
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
        $this->forge->addKey('id_kelas', true);
        $this->forge->addForeignKey('id_jurusan', 'jurusan', 'id_jurusan');
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropForeignKey('kelas', 'kelas_id_jurusan_foreign');
        $this->forge->dropTable('kelas');
    }
}