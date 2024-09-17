<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between py-3 px-5">   
                    <h1 class="py-3 font-semibold text-teal-900 text-lg">Users</h1>
                    <button ><a href="{{ route('create.user') }}" class="px-5 py-2 bg-sky-900 text-sky-100 rounded-md">Create New User</a></button> 
                </div>
                
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="border-b bg-sky-900 text-sky-100 text-left text-xs font-semibold uppercase tracking-wide">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Account Number</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse ($users as $user)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->account->account_number  ?? null}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{route('user.show', $user)}}" class="px-4 py-2 bg-orange-500 text-white rounded-md">View</a>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-3" colspan="4">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>