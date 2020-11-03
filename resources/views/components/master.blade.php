<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/c96c39e9b1.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @if (Route::is('home'))
    <script src="{{ asset('js/main.js') }}" data-turbolinks-track="reload" defer></script>
    @endif
    {{-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Gaming Blog</title>
</head>

<body>
    <div>
        {{ $slot }}
    </div>


</body>

</html>