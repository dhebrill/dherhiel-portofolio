<!DOCTYPE html>
<html lang="en" class="bg-ink-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#05070d">
    <title>{{ $profile['name'] }} — {{ $profile['role'] }}</title>
    <meta name="description" content="{{ $profile['summary'] }}">

    <meta property="og:title" content="{{ $profile['name'] }} — {{ $profile['role'] }}">
    <meta property="og:description" content="{{ $profile['summary'] }}">
    <meta property="og:type" content="website">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen overflow-x-hidden">
    {{-- Decorative background grid + soft gradient --}}
    <div class="pointer-events-none fixed inset-0 -z-10 bg-grid opacity-60"></div>
    <div class="pointer-events-none fixed inset-0 -z-10 bg-gradient-to-b from-ink-950 via-ink-900/80 to-ink-950"></div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
