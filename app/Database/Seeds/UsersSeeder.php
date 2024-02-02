<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'john_doe',
                'email' => 'john@example.com',
                'mobile' => '1234567890',
                'password' => password_hash('admin@123', PASSWORD_DEFAULT),
                'profile_pic' => 'path/to/profile_pic1.jpg',
            ],
            [
                'username' => 'jane_doe',
                'email' => 'jane@example.com',
                'mobile' => '9876543210',
                'password' => password_hash('admin@123', PASSWORD_DEFAULT),
                'profile_pic' => 'path/to/profile_pic2.jpg',
            ],
            // Add more users as needed
        ];

        // Using Query Builder to insert data
        $this->db->table('users')->insertBatch($data);
    }
}
