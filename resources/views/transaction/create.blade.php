<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('transaction.store', $user) }}" class="p-8">
                    @csrf
            
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                    <!-- Date Posted-->
                    <div class="mt-4">
                        <x-input-label for="date_posted" :value="__('Date Posted')" />
                        <x-text-input id="date_posted" class="block mt-1 w-full" type="date" name="date_posted" :value="old('date_posted')" required autocomplete="date_posted" />
                        <x-input-error :messages="$errors->get('date_posted')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="4" cols="10" placeholder="Description" class="border border-gray-300 rounded-lg w-full bg-gray-100">{{old('description')}}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="debit" :value="__('Debit')" />
                        <x-text-input id="debit" class="block mt-1 w-full" type="text" name="debit" :value="old('debit')" autocomplete="debit" />
                        <x-input-error :messages="$errors->get('debit')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="credit" :value="__('Credit')" />
                        <x-text-input id="credit" class="block mt-1 w-full" type="text" name="credit" :value="old('credit')" autocomplete="credit" />
                        <x-input-error :messages="$errors->get('credit')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Add Transaction') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>