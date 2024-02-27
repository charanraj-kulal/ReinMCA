<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PagePermission extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'permission_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_group_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'page_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'page_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_on' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'last_modified_on' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'last_modified_by' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addKey('permission_id', true);
        $this->forge->createTable('page_permissions');
    }

    public function down()
    {
        $this->forge->dropTable('page_permissions', true);
    }
}
