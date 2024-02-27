<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusLog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'exp_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'reason' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'comment' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_on' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('status_logs');
    }

    public function down()
    {
        $this->forge->dropTable('status_logs', true);
    }
}
