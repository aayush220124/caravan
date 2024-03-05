<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarvansTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'admin_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'caravan_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'make' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'model' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'year' => [
                'type' => 'INT',
            ],
            'registration_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'mileage' => [
                'type' => 'INT',
            ],
            'images_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'video_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'short_description' => [
                'type' => 'TEXT',
            ],
            'long_description' => [
                'type' => 'TEXT',
            ],
            'tags' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'features' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'amenities' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'rules_regulations' => [
                'type' => 'TEXT',
            ],
            'minimum_days_available' => [
                'type' => 'INT',
                'null' => true,
            ],
            'dates_availability' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'deposit_price' => [
                'type' => 'INT',
            ],
            'per_day_price' => [
                'type' => 'INT',
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp'
        ]);

        // $this->forge->addForeignKey('admin_id', 'admins', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addKey('id', true);
        $this->forge->createTable('caravans');
    }

    public function down()
    {
        $this->forge->dropTable('caravans');
    }
}
