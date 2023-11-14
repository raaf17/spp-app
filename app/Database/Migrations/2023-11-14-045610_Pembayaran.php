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
            'id_petugas' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '20'
            ],
            'tgl_bayar' => [
                'type' => 'DATE',
            ],
            'bulan_dibayar' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'tahun_dibayar' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'id_spp' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
            ],
            'jumlah_bayar' => [
                'type' => 'BIGINT',
                'constraint' => '50',
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
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_petugas', 'petugas', 'id_petugas');
        $this->forge->addForeignKey('nisn', 'siswa', 'nisn');
        $this->forge->addForeignKey('id_spp', 'spp', 'id_spp');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
