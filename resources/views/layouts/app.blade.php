<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            {{-- Main Menu Navigation --}}
            <section class="hidden lg:block fixed bg-white border-r border-t border-gray-100 top-16 left-0 w-64 h-screen">
                <ul class=" flex flex-col space-y-6 p-6">
                    <li class="border-b border-gray-100 pb-4">
                        <x-nav-link>
                            {{ __('Home') }}
                        </x-nav-link>
                    </li>
                    @if (Auth::user()->role->name === 'client')
                        <li class="border-b border-gray-100 pb-4">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </li>
                    @endif
                    @if (Auth::user()->role->name === 'super_administrator')
                        <li class="border-b border-gray-100 pb-4">
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Admin Dashboard') }}
                            </x-nav-link>
                        </li>
                    @endif
                    <li class="border-b border-gray-100 pb-4">
                        <x-nav-link :href="route('transfer')" :active="request()->routeIs('transfer')">
                            {{ __('Transfers') }}
                        </x-nav-link>
                    </li>
                </ul>
            </section>


            <!-- Page Content -->
            <main class="lg:ml-64 mt-16">
                {{ $slot }}
            </main>

            @if(session('success_message'))
                <x-notification
                    redirect="true"
                    messageToDisplay="{{ (session('success_message')) }}"
                />
            @endif

            @if(session('error_message'))
                <x-notification
                    redirect="true"
                    type="error"
                    messageToDisplay="{{ (session('error_message')) }}"
                />
            @endif
        </div>
    </body>
</html>
