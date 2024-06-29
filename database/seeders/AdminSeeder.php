<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@newsbit.com',
            'password' => '$2y$10$ah0EA9rfwoHeG94biKUsfemZTHwO5CMNB3MGTzx2XMJV9ziAJwrI6', // Admin123!
            'role' => 'admin'
        ]);
    }
}
