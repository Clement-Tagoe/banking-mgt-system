<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'date_posted' => Carbon::create('2023', '01', '23'),
            'description' => 'transfer',
            'credit' => 15000,
            'account_id' => 1,
        ]);
    }
}
