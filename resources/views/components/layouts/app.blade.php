<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css') {{-- TailwindCSS --}}
    @stack('styles') {{-- Additional styles if needed --}}
    {{--    @livewireStyles --}}{{-- Livewire styles --}}
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">

{{-- Navigation Bar --}}
<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                {{-- Mobile menu button --}}
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                @auth
                    <div class="flex-shrink-0">
                        <a href="{{ url('/') }}"
                           class="text-white text-2xl font-semibold">{{ config('app.name', 'Laravel') }}</a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Dashboard') }}</a>
                            <a href="{{ route('project.index') }}"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Projects') }}</a>
                        </div>
                    </div>
                @else
                    <div class="flex-shrink-0">
                        <a href="{{ url('/') }}"
                           class="text-white text-2xl font-semibold">{{ config('app.name', 'Laravel') }}</a>
                    </div>
                @endauth
            </div>
            @auth
                <div class="relative inline-block text-left">
                    <div>
                        <a href="{{ route('logout') }}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Logout') }}</a>
                    </div>
                </div>
            @endauth

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

            </div>
        </div>
    </div>
</nav>

{{-- Main Content --}}
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @yield('content')
        {{ $slot }}
    </div>
</div>

{{--@livewireScripts --}}{{-- Livewire scripts --}}
@stack('scripts') {{-- Additional scripts if needed --}}
</body>
</html>
