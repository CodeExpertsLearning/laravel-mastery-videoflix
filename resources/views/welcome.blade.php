<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-black dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                @if(auth()->user()->role == 'ROLE_ADMIN')
                    <a href="{{ route('dashboard') }}" class="text-sm underline text-white">Meu Painel</a>
                @else
                    <a href="{{ route('my-content.main') }}" class="text-sm underline text-white">Meu Painel</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="text-sm underline text-white">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm underline text-white">Cadastro</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center text-center pt-8 sm:justify-start sm:pt-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white text-6xl w-96 h-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
        </div>

        <div class="mt-8 text-white text-center dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg mb-20">
            <h2 class="text-3xl font-extrabold uppercase mb-8">VideoFlix</h2>
            <h5>Tenha Acesso a Nosso Catálogo por apenas <strong class="text-2xl text-green-600">R$ 27,90</strong></h5>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>

                    <a href="{{route('subscriptions.checkout')}}" class="ml-1 underline">
                        Assine Já!
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel Mastery
            </div>
        </div>
    </div>
</div>
</body>
