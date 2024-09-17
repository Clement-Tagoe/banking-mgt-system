<x-modal name="error-modal"  maxWidth="md" focusable>
    <div class="p-6">
        <div class="flex space-x-2 items-center justify-center font-extrabold border-b border-gray-200 pb-2">
            <h1>Error Message</h1>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>  
            </div>     
        </div>
        <div class="text-gray-500 text-center py-2">
            <p>Sorry, you can only make transfers after deal is complete. <br> Please finalize deal and continue. <br> Thank you </p>
        </div>
        <div class="flex items-center justify-center">
            <x-secondary-button x-on:click.prevent="$dispatch('close')">Close</x-secondary-button>
        </div>
        
    </div>
</x-modal>