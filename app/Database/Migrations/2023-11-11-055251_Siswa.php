<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nisn' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'unsigned'       => false,
                'auto_increment' => false,
            ],
            'nis' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_siswa' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_kelas' => [
                'type' => 'INT',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'id_spp' => [
                'type' => 'INT',
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
        $this->forge->addKey('nisn', true);
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas');
        $this->forge->addForeignKey('id_spp', 'spp', 'id_spp');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}