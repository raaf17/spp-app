<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tagihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tagihan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_tagihan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nominal' => [
                'type'       => 'BIGINT',
                'constraint' => '50',
            ],
            'keterangan' => [
                'type'       => 'TEXT',
            ],
            'bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
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
        $this->forge->addKey('id_tagihan', true);
        $this->forge->createTable('tagihan');
    }

    public function down()
    {
        $this->forge->dropTable('tagihan');
    }
}