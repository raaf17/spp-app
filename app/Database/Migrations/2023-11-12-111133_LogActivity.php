<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogActivity extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_activity' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'subject' => [
                'type'       => 'TEXT',
            ],
            'detail' => [
                'type'       => 'JSON',
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint'     => '255',
            ],
            'method' => [
                'type'       => 'VARCHAR',
                'constraint'     => '255',
            ],
            'agent' => [
                'type'       => 'VARCHAR',
                'constraint'     => '255',
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
        $this->forge->addKey('id_activity', true);
        $this->forge->createTable('log_activity');
    }

    public function down()
    {
        $this->forge->dropTable('log_activity');
    }
}
