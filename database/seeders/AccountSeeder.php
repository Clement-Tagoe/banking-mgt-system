<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'account_number' => '1542672027013',
            'user_id' => 1,
            'type' => 'current account',
            'currency' => '$',
            'date' => Carbon::create('2024', '01', '30'),
            'time' => '11:35:28',
        ]);
    }
}
