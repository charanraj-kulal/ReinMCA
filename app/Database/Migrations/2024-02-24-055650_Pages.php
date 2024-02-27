<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'page_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'page_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'page_group' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'page_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'page_group_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'page_order_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'new_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'edit_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'delete_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'view_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'print_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'access_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'page_group_icon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'listorder' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addKey('page_id', true);
        $this->forge->createTable('pages');
    }

    public function down()
    {
        $this->forge->dropTable('pages', true);
    }
}
