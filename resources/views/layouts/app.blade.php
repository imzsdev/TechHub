<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('partials.header')
    
    @include('partials.navbar')

<hr>

<div class="container">
    @yield('content')
</div>

<hr>

    <p>© 2026 TechHub. All Rights Reserved.</p>

</body>

</html>