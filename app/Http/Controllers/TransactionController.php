<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('transaction.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        $formFields = $request->validate([
            'date_posted' => 'required',
            'description' => 'required',
            'credit' => 'nullable',
            'debit' => 'nullable',
            'account_id' => 'nullable',
        ]);

        $formFields['account_id'] = $user->account->id;;

        Transaction::create($formFields);

        return Redirect::route('user.show', $user)->with('success_message', 'Transaction added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $formFields = $request->validate([
            'date_posted' => 'required',
            'description' => 'required',
            'credit' => 'nullable',
            'debit' => 'nullable',
            'account_id' => 'nullable',
        ]);

        $transaction->update($formFields);

        $account = $transaction->account;
        $user = $account->user;

        return Redirect::route('user.show', $user)->with('success_message', 'Transaction updated successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $account = $transaction->account;
        $user = $account->user;

        $transaction->delete();
        
        return Redirect::route('user.show', $user)->with('success_message', 'Transaction deleted successfully!'); 
    }
}
