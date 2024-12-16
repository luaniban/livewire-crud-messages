<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Setor Informática Educativa e Leandro Andrade">
        <link rel="shortcut icon" href="{{ asset('storage/image/logo.svg') }}">

        <title>{{ config('app.name', 'Laravel') }} | {{ isset($title) ? $title : 'Painel' }}</title>

        <!-- Icon -->
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <tallstackui:script />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans antialiased text-gray-900 dark:text-gray-100">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
