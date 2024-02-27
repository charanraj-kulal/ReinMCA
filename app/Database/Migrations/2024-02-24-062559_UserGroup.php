<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserGroup extends Migration
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
            'user_group' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_on' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'modified_on' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user_groups');
    }

    public function down()
    {
        $this->forge->dropTable('user_groups', true);
    }
}
