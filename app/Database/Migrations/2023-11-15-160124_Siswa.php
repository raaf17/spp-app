<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_siswa' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nis' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'nisn' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'id_kelas' => [
                'type' => 'INT',
                'constraint'     => 20,
                'unsigned'       => false,
            ],
            'jenis_kelamin' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'no_telp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
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
        $this->forge->addKey('id_siswa', true);
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropForeignKey('siswa', 'siswa_id_kelas_foreign');
        $this->forge->dropTable('siswa');
    }
}
