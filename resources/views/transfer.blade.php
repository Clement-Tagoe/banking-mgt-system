<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{route('transfer.update')}}">
                    @csrf
                    @method('put')
                    <div class="p-6">
                        <h1 class="font-bold text-xl py-4 border-b border-gray-200">Transfers</h1>

                        <div class="grid grid-cols-4 py-8 border-b border-gray-200">
                            <div class="col-span-1">
                                <h1>Transfer From</h1>
                            </div>
                            
                            <div class="col-span-2">
                                <div class="flex flex-col space-y-4">
                                    <x-input-label for="source_account" :value="__('Source Account')" class="sr-only"/>
                                    <select name="source_account" id="source_account" class="border border-gray-300 rounded-lg h-12 w-full bg-gray-100">
                                        <option value="">Choose Source Account</option>
                                        <option value="{{$account->id}}">{{$account->account_number}}</option>
                                      </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('source_account')" />

                                    <x-input-label for="amount" :value="__('Amount')" class="sr-only"/>
                                    <input id="amount" name="amount" type="text" placeholder="Amount" class="border border-gray-300 rounded-lg h-12 w-full bg-gray-100">
                                    <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 py-8">
                            <div class="col-span-1">
                                <h1>Transfer To</h1>
                            </div>
                            
                            <div class="col-span-2">
                                <div class="flex flex-col space-y-4">
                                    <x-input-label for="bank_name" :value="__('Bank Name')" class="sr-only"/>
                                    <input id="bank_name" name="bank_name" type="text" placeholder="Bank Name" class="border border-gray-300 rounded-lg h-12 w-full bg-gray-100">
                                    <x-input-error class="mt-2" :messages="$errors->get('bank_name')" />
                                    
                                    <x-input-label for="account_number" :value="__('Account Number')" class="sr-only"/>
                                    <input id="account_number" name="account_number" type="text" placeholder="Account Number" class="border border-gray-300 rounded-lg h-12 w-full bg-gray-100">
                                    <x-input-error class="mt-2" :messages="$errors->get('account_number')" />
                                    
                                    <x-input-label for="routing_number" :value="__('Routing Number')" class="sr-only"/>
                                    <input id="routing_number" name="routing_number" type="text" placeholder="Routing Number" class="border border-gray-300 rounded-lg h-12 w-full bg-gray-100">
                                    <x-input-error class="mt-2" :messages="$errors->get('routing_number')" />
                                    
                                    <x-input-label for="bank_address" :value="__('Bank Address')" class="sr-only"/>
                                    <input id="bank_address" name="bank_address" type="text" placeholder="Bank Address" class="border border-gray-300 rounded-lg h-12 w-full bg-gray-100">
                                    <x-input-error class="mt-2" :messages="$errors->get('bank_address')" />
                                    
                                    <x-input-label for="reference" :value="__('Reference')" class="sr-only"/>
                                    <textarea id="reference" name="reference" rows="4" cols="50" placeholder="Reference" class="border border-gray-300 rounded-lg w-full bg-gray-100"></textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('reference')" />
                                </div>

                            </div>
                        </div>

                        <div x-data class="grid grid-cols-4 py-2">
                            <div class="col-span-1">

                            </div>
                            <div class="col-span-2">
                                <button x-on:click.prevent="$dispatch('open-modal', 'error-modal')" type="submit" class="w-full px-10 py-3 bg-sky-900 text-white rounded-lg">Make Transfer</button>
                                <p class="text-center pt-4"><span class="font-semibold">Note:</span> Transfers can only be made to linked accounts.</p>
                            </div>
                            
                        </div>      
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-error-modal />
</x-app-layout>