<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get the latest updates and news articles">
    <title>{{ $title ?? 'GenZ Pati News Portal' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- In <head> for swiper js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <!-- Before </body> -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>
