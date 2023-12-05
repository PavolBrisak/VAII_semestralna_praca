<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Môj účet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>

@include('header')
@include('search')
@include('navigation-bar')

<p>Boli ste prihlaseny ako {{$user->name}}</p>
<a href="{{route('app_zmena_mena')}}">Zmenit meno</a>
<a href="{{route('app_zmena_hesla')}}">Zmenit si heslo</a>

@include('footer')
</body>
</html>
