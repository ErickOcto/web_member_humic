<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'faculty' => 'Teknik',
            'department' => 'Informatika',
            'handphone' => '081234567890',
            'religion' => 'Islam',
            'gender' => true,
            'address' => 'Alamat Admin',
            'birthday' => '1985-01-01',
            'status' => true,
            'NIP' => '12345678',
            'position' => 1,
            'position_name' => 'Admin',
            'isAdmin' => true,
        ]);
    }
}
