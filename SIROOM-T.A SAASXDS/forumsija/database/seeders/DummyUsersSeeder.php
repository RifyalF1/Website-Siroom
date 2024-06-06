<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Rija Nurdiyanto',
                'email' => 'Rija123@example.com',
                'role' => 'siswa',
                'password'=>bcrypt('rija123'),
            ],
            [
                'name' => 'Solideo',
                'email' => 'Solideo123@example.com',
                'role' => 'siswa',
                'password'=>bcrypt('solideo123'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin123@example.com',
                'role' => 'admin',
                'password'=>bcrypt('admin123'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
