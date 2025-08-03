<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'AgriMarketHub')</title>

    
</head>
<body>

    {{-- Navigation Bar --}}
    @include('layouts.nav')

    {{-- Main Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
