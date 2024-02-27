<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Expense extends Migration
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
            'e_date' => [
                'type' => 'DATE',
            ],
            'invoice_no' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cost' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2', // 10 digits, 2 of which are decimals
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'approved_amt' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2', // 10 digits, 2 of which are decimals
            ],
            'payout_month' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'payout_year' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'forwarded_to' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'file_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
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
        $this->forge->createTable('expenses', true);
    }

    public function down()
    {
        $this->forge->dropTable('expenses', true);
    }
}
