<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body >
        <main class="font-sans text-gray-900 antialiased">
            <div class="max-w-5xl flex flex-col mx-auto px-10 py-10 pt-5 bg-white m-20">
                <div class=" flex mx-auto justify-center my-10">
                    <span class="font-semibold text-4xl font-bold uppercase text-gray-800 leading-tight my-10 mr-5">
                        {{ __('Patient Medical Record System') }}
                    </span>
                </div>
                @yield('content')
            </div>
        </main>     
        @livewireScripts
    </body>
</html>
