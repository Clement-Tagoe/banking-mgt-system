<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {
        $account = User::find(Auth::id())->account;
        
        return view('transfer', compact('account'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'source_account' => 'required',
            'amount' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'routing_number' => 'required',
            'bank_address' => 'required',
            'reference' => 'required'
        ]);

        return redirect()->route('transfer.update');
        
    }
}
