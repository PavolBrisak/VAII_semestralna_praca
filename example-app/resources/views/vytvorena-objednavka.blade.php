<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Vytvorenie objednávky</title>
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kosik.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <link rel="stylesheet" href="{{url('styles/registracia.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="{{url('js/main.js')}}"></script>
    <script src="{{url('js/form_validation.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Ďakujeme za vašu objednávku</p>
</div>
<div class="nova-objednavka">
    <p>Číslo vašej objednávky je: {{$objednavka->id}}</p>
    <p>Bude Vám odoslané potvrdenie objednávky a prípadne i informácie na sledovanie zásielky.</p>
</div>
<div class="nova-objednavka-button">
    <button><a href="{{ route('app_index') }}">Späť na titulnú stránku</a></button>
    <button><a href="{{ route('app_moje_objednavky') }}">Zobraziť moje objednávky</a></button>
</div>
@include('footer')
</body>
</html>
