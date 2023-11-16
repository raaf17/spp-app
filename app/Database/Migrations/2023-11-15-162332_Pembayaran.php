<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
            ],
            'tanggal' => [
                'type'           => 'DATETIME',
            ],
            'bulan' => [
                'type'           => 'DATE',
            ],
            'nominal' => [
                'type'           => 'BIGINT',
                'constraint'     => '30'
            ],
            'id_tahunajaran' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
            ],
            'id_siswa' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
            ],
            'id_tagihan' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->addForeignKey('id_tahunajaran', 'tahun_ajaran', 'id_tahunajaran');
        $this->forge->addForeignKey('id_siswa', 'siswa', 'id_siswa');
        $this->forge->addForeignKey('id_tagihan', 'tagihan', 'id_tagihan');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}