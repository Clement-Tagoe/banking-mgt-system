<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\DiagramTransactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiagramTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'credit' => 1200,
            'created_at' => Carbon::now()->subDays(30),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'debit' => 1300,
            'created_at' => Carbon::now()->subDays(30),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'credit' => 2400,
            'created_at' => Carbon::now()->subDays(60),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'debit' => 3400,
            'created_at' => Carbon::now()->subDays(90),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'credit' => 7000,
            'created_at' => Carbon::now()->subDays(90),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'debit' => 8500,
            'created_at' => Carbon::now()->subDays(120),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'credit' => 3200,
            'created_at' => Carbon::now()->subDays(120),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'debit' => 3400,
            'created_at' => Carbon::now()->subDays(120),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'credit' => 180,
            'created_at' => Carbon::now()->subDays(120),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'debit' => 5300,
            'created_at' => Carbon::now()->subDays(120),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer',
            'credit' => 3800,
            'created_at' => Carbon::now()->subDays(150),
        ]);

        DiagramTransactions::create([
            'date_posted' => Carbon::create('2023', '01', '27'),
            'description' => 'transfer by Conor Blake',
            'credit' => 14000,
            'created_at' => Carbon::now()->subDays(150),
        ]);
    }
}