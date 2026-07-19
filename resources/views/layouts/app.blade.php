<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechHub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <h2>🛒 TechHub</h2>
    
    @include('partials.navbar')

<hr>

<div class="container">
    @yield('content')
</div>

<hr>

    <p>© 2026 TechHub. All Rights Reserved.</p>

</body>

</html>