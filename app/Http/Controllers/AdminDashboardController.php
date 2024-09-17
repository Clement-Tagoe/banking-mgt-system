<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use App\Models\Account;
use Illuminate\View\View;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::find(Auth::id())->clients;
    
        return view('admin.admin-dashboard', compact('users'));
    }

    public function createUser(): View
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['nullable'],
            'owner' => 'nullable',
        ]);

        $formFields['role_id'] = Role::CLIENT->value;
        $formFields['owner'] = Auth::id();

        $user = User::create($formFields);

        event(new Registered($user));

        return Redirect::route('admin.dashboard')->with('success_message', 'User created successfully!');
    }

    public function showUser(User $user)
    {
        $account = $user->account;

        $transactions = $user->transactions;
        $account_balance = $transactions->sum('credit') - $transactions->sum('debit');
        
        return view('admin.user-show', compact('user', 'account', 'transactions', 'account_balance'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateProfile(Request $request, User $user): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->update($formFields);

        return Redirect::route('user.edit', $user)->with('success_message', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request, User $user): RedirectResponse
    {
        
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        if (Hash::check($validated['current_password'], $user->password))
        {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('success_message', 'Password updated successfully!');

        } else 
        {
            return back()->with('message', 'incorrect-password');
        }
        
    }

    public function deleteUser(User $user)
    {
        if ($user->owner != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $user->delete();

        return Redirect::route('admin.dashboard')->with('success_message', 'User deleted successfully!'); 
    }
}
