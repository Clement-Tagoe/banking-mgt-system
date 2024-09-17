<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
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
        return view('account.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $formFields = $request->validate([
            'account_number' => 'required|min:13',
            'date' => 'nullable',
            'time' => 'nullable',
            'type' => 'required',
            'currency' => 'required',
        ]);

        
        Account::create([
            'account_number' => $formFields['account_number'],
            'date' => $formFields['date'],
            'time' => $formFields['time'],
            'type' => $formFields['type'],
            'currency' => $formFields['currency'],
            'user_id' => $user->id,
        ]);

        return Redirect::route('user.show', $user)->with('success_message', 'Account created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $formFields = $request->validate([
            'account_number' => 'required|min:13',
            'date' => 'nullable',
            'time' => 'nullable',
            'type' => 'required',
            'currency' => 'required',
        ]);

        $account->update($formFields);

        $user = $account->user;

        return Redirect::route('user.show', $user)->with('success_message', 'Account updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
