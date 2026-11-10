<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body class="font-sans flex min-h-screen flex-col">
    {{-- Navbar tidak ditampilkan di halaman yang mengisi section 'tanpa-navbar' (login) --}}
    @hasSection('tanpa-navbar')
    @else
    <x-navbar :username="$username" />
    @endif

    <main class="flex-1 flex flex-col">
        @yield('content')
    </main>

    @include('components.footer')

    @yield('scripts')
</body>

</html>