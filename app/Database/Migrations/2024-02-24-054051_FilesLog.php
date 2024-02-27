<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FilesLog extends Migration
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
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'uploaded_by' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_on' => [
                'type' => 'TIMESTAMP',
                'default' => null,
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('files_log');
    }

    public function down()
    {
        $this->forge->dropTable('files_log');
    }
}
