<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
         <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            
<!-- Off-Canvas Cart Sidebar -->
<div id="cart-sidebar"
     class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="p-4 flex justify-between items-center border-b">
        <h2 class="text-lg font-semibold">Panier</h2>
        <button id="close-cart" class="text-gray-500 hover:text-gray-800">&times;</button>
    </div>
    <div id="cart-items" class="p-4 space-y-4 overflow-y-auto h-[calc(100%-64px)]">
        <!-- JS will append cart items here -->
    </div>
    <div class="p-4 border-t">
        <button id="checkout-btn" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Checkout
        </button>
    </div>
</div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
