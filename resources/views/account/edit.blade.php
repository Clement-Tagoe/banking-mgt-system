<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('account.update', $account) }}" class="p-8">
                    @csrf
                    @method('put')
                    <!-- Account Number -->
                    <div>
                        <x-input-label for="account_number" :value="__('Account Number')" />
                        <x-text-input id="account_number" class="block mt-1 w-full" type="text" name="account_number" :value="old('account_number', $account->account_number)" required autofocus autocomplete="account_number" />
                        <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Account Type')" />
                        <select name="type" id="type" class="h-10 py-1 px-2 rounded-md border border-gray-300 hover:border-gray-400 outline-none text-gray-700 placeholder-gray-400 w-full block mt-1">
                            <option value="">Choose type</option>
                            <option value="current account" {{ old('type', $account->type) == 'current account' ? 'selected' : '' }}>Current Account</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="currency" :value="__('Currency')" />
                        <select name="currency" id="currency" class="h-10 py-1 px-2 rounded-md border border-gray-300 hover:border-gray-400 outline-none text-gray-700 placeholder-gray-400 w-full block mt-1">
                            <option value="">Choose currency</option>
                            <option value="$" {{ old('currency', $account->currency) == '$' ? 'selected' : '' }}>USD</option>
                            <option value="€" {{ old('currency', $account->currency) == '€' ? 'selected' : '' }}>EUR</option>
                            <option value="£" {{ old('currency', $account->currency) == '£' ? 'selected' : '' }}>GBP</option>
                        </select>
                        <x-input-error :messages="$errors->get('currency')" class="mt-2" />
                    </div>
            
                    <!-- Date -->
                    <div class="mt-4">
                        <x-input-label for="date" :value="__('Date')" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $account->date)" required autocomplete="date" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>
            
                    <!-- Time -->
                    <div class="mt-4">
                        <x-input-label for="time" :value="__('Time')" />
                        <x-text-input id="time" class="block mt-1 w-full" type="text" name="time" :value="old('time', $account->time)" required autocomplete="time" />
                        <x-input-error :messages="$errors->get('time')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Update Account') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>