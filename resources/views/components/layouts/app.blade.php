@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="https://emojicdn.elk.sh/💰">
    @vite('resources/css/app.css')
</head>

<body class="antialiased text-gray-800 bg-gray-700" style="background-image: url(/assets/background.png)">
    {{ $slot }}
</body>

</html>