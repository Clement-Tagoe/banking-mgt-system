<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Account Activity',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\DiagramTransactions',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        
        $chart1 = new LaravelChart($chart_options);

        $user = User::find(Auth::id());

        $account = $user->account;
        $account_count = $user->account()->count();

        $transactions = $user->transactions;
        $total_debit = $transactions->sum('debit');
        $total_credit = $transactions->sum('credit');
        $total = $total_credit - $total_debit;
        
        
        return view('dashboard', compact('chart1', 'account', 'account_count', 'transactions', 'total_debit', 'total_credit', 'total'));
    }
}
