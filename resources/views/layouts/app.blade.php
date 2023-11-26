<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        @include('layouts.css')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @include('layouts.loader')
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50 hidden" id="content">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mb-5">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @if (session()->has('success'))
                    <x-alert-success></x-alert-success>
                @endif
                @if (session()->has('failed'))
                    <x-alert-failed></x-alert-failed>
                @endif
                {{ $slot }}
            </main>
        </div>

        {{-- Discord Widget --}}
        <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
            new Crate({
                server: '1178213380134289458',
                channel: '1178213380738260994',
                location: ['bottom', 'right']
            })
        </script>
        @include('layouts.js')
    </body>
</html>
