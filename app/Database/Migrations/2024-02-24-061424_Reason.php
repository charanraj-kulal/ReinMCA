<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reason extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'd_date' => [
                'type' => 'DATE',
            ],
            'd_invoice_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'd_claim_on' => [
                'type' => 'DATE',
            ],
            'd_exp_amt' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'd_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'd_file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('reasons');
    }

    public function down()
    {
        $this->forge->dropTable('reasons', true);
    }
}
