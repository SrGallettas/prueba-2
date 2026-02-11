<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("titulo")</title>
    {{-- CSS compilat amb Bootstrap --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.nav')
    @yield("contenido")
</body>
</html>