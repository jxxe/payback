@props([
    'title' => 'Untitled'
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased text-gray-800">
    {{ $slot }}
</body>

</html>