<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Michael Ballack',
            'email' => 'michael@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => Role::SUPER_ADMINISTRATOR->value,
        ]);

        User::create([
            'name' => 'Joe Cole',
            'email' => 'joe@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => Role::SUPER_ADMINISTRATOR->value,
        ]);
    }
}
