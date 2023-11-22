@props([
    'title',
    'h1' => '',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.scss'])
</head>
<body>
    <h1>{{ $h1 }}</h1>
    {{ $slot }}
    @vite(['resources/js/app.js'])
</body>
</html>
