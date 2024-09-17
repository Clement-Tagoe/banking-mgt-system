<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <h2 class="font-bold text-sky-900 text-lg">Personal Information</h2>
                    <hr class="mt-2">
                    <div class="md:w-9/12 grid grid-cols-1 sm:grid-cols-2 mt-5">
                        <div class="">
                            <h4 class="text-sky-900 font-bold">Full Name</h4>
                            <p>{{$user->name}}</p>
                        </div>
                        <div class="">
                            <h4 class="text-sky-900 font-bold">Email Address</h4>
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                    
                    <hr class="mt-2">
                    <div class="flex justify-end">
                        <a href="{{route('user.edit', $user)}}" class="flex space-x-2 px-3 bg-sky-900 hover:bg-sky-800 text-white p-2 rounded-md mt-2">
                            <span>Edit</span> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 border-b border-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>      
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-4xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <h2 class="font-bold text-sky-900 text-lg">Bank Account</h2>
                    <hr class="mt-2">
                        <div class="md:w-9/12 grid grid-cols-1 sm:grid-cols-2 mt-5">
                            <div class="">
                                <h4 class="text-sky-900 font-bold">Account Number</h4>
                                <p>{{$account->account_number ?? null}}</p>
                            </div>
                            <div class="">
                                <h4 class="text-sky-900 font-bold">Account Type</h4>
                                <p>{{$account->type ?? null}}</p>
                            </div>
                        </div>

                        <div class="md:w-9/12 grid grid-cols-1 sm:grid-cols-2 mt-5">
                            <div class="">
                                <h4 class="text-sky-900 font-bold">Account Currency</h4>
                                <p>{{$account->currency ?? null}}</p>
                            </div>
                            <div class="">
                                <h4 class="text-sky-900 font-bold">Account Balance</h4>
                                <p>{{number_format($account_balance, '2', '.', ',')}}</p>
                            </div>
                        </div>
                        <hr class="mt-2">
                        @if ($account)
                            <div class="flex justify-end">
                                <a href="{{ route('account.edit', $account)}}" class="flex space-x-2 px-3 bg-sky-900 hover:bg-sky-800 text-white p-2 rounded-md mt-2">
                                    <span>Edit</span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 border-b border-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>      
                                </a>
                            </div>
                        @else
                            <div class="flex justify-end">
                                <a href="{{ route('account.create', $user)}}" class="flex space-x-2 px-3 bg-sky-900 hover:bg-sky-800 text-white p-2 rounded-md mt-2">
                                    <span>Create Account</span>    
                                </a>
                            </div>
                        @endif     
                </div>
            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-4xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <div class="flex justify-between py-3 px-5">   
                        <h1 class="py-3 font-semibold text-teal-900 text-lg">Recent Transactions</h1>
                        <button><a href="{{route('transaction.create', $user)}}" class="px-5 py-2 bg-sky-900 text-sky-100 rounded-md">Add Transaction</a></button> 
                    </div>
                    <hr class="mt-2">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="border-b bg-sky-900 text-sky-100 text-left text-xs font-semibold uppercase tracking-wide">
                                <th class="px-4 py-3">Date Posted</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Debit</th>
                                <th class="px-4 py-3">Credit</th>
                                <th class="px-4 py-3">Balance</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @php
                                $runningTotal = 0;
                            @endphp
                            @forelse($transactions as $transaction)
                                @php
                                    $balance = $transaction->credit - $transaction->debit;
                                    $runningTotal += $balance;
                                @endphp
                                @if($loop->even)
                                    <tr class=" bg-sky-100 text-gray-700">
                                        <td class="px-4 py-3 text-sm">
                                            {{ $transaction->date_posted }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $transaction->description }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-red-500">
                                            {{$account->currency}} {{ number_format($transaction->debit, 2, '.', ',')}}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-green-500">
                                            {{$account->currency}} {{ number_format($transaction->credit, 2, '.', ',')}}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{$account->currency}} {{ number_format($runningTotal, 2, '.', ',') }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="flex space-x-2">
                                                <div class="inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-600 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    <a href="{{route('transaction.edit', $transaction)}}">Edit</a>
                                                </div>
                                                <div>
                                                    <x-danger-button
                                                        x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-transaction-deletion-{{$transaction->id}}')"
                                                    >{{ __('Delete') }}</x-danger-button>
                                                </div>   
                                            </div>
                                        </td>
                
                                        <x-modal name="confirm-transaction-deletion-{{$transaction->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                            <div class="p-6">
                                                <form method="post" action="{{ route('transaction.destroy', $transaction) }}">
                                                    @csrf
                                                    @method('delete')
                                        
                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Are you sure you want to delete this transaction?') }}
                                                    </h2>
                                        
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>
                                        
                                                        <x-danger-button class="ms-3">
                                                            {{ __('Delete Transaction') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                        </x-modal>
                                    </tr>
                                @else
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-sm">
                                            {{ $transaction->date_posted}}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $transaction->description }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-red-500">
                                            {{$account->currency}} {{ number_format($transaction->debit, 2, '.', ',')}}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-green-500">
                                            {{$account->currency}} {{ number_format($transaction->credit, 2, '.', ',')}}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{$account->currency}} {{ number_format($runningTotal, 2, '.', ',') }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="flex space-x-2">
                                                <div class="inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-600 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    <a href="{{route('transaction.edit', $transaction)}}">Edit</a>
                                                </div>
                                                <div>
                                                    <x-danger-button
                                                        x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-transaction-deletion-{{$transaction->id}}')"
                                                    >{{ __('Delete') }}</x-danger-button>
                                                </div>   
                                            </div>
                                        </td>
                                        
                
                                        <x-modal name="confirm-transaction-deletion-{{$transaction->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                            <div class="p-6">
                                                <form method="post" action="{{ route('transaction.destroy', $transaction) }}">
                                                    @csrf
                                                    @method('delete')
                                        
                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Are you sure you want to delete this transaction?') }}
                                                    </h2>
                                        
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>
                                        
                                                        <x-danger-button class="ms-3">
                                                            {{ __('Delete Transaction') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </x-modal>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="px-4 py-3" colspan="4">No transactions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>