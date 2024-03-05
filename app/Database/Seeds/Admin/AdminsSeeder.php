<?php

namespace App\Database\Seeds\Admin;

use CodeIgniter\Database\Seeder;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin@123', PASSWORD_DEFAULT),
            ],
        ];

        // Using Query Builder to insert data
        $this->db->table('admins')->insertBatch($data);
    }
}
