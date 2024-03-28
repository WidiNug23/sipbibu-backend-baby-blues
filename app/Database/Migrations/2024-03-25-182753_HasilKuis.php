<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HasilKuis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'total_skor' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'hasil_kesimpulan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hasil_kuis');
    }

    public function down()
    {
        $this->forge->dropTable('hasil_kuis');
    }
}
