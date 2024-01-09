<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objednávka vytvorená</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kosik.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <link rel="stylesheet" href="{{url('styles/registracia.css')}}">
    <script src="{{url('js/main.js')}}"></script>
    <script src="{{url('js/form_validation.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Nová objednávka</p>
</div>
<div class="new-order-container">
    <p>Ďakujeme za vašu objednávku. Vaša objednávka bola úspešne vytvorená.</p>
    <p>Číslo vašej objednávky je: {{ $objednavka->id }}</p>
</div>
@include('footer')
</body>
</html>
