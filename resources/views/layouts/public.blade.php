<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'By Amani')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="..." crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900">

    {{-- Optional Top Banner --}}
    @hasSection('top-banner')
        <div class="bg-gray-100">@yield('top-banner')</div>
    @endif

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @if (!isset($hideFooter))
        @include('partials.footer')
    @endif

    @stack('scripts')
</body>
</html>
