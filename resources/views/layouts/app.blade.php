<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'WayWay')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')          {{-- ← tambah ini --}}
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&display=swap" rel="stylesheet">
<body class="font-sans min-h-screen flex flex-col">

    @include('wisatawan.components.navbar')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('wisatawan.components.footer')

    <x-waybot />

    @stack('scripts')
@include('wisatawan.components.loading-screen')
</body>
</html>