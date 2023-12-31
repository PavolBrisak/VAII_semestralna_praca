<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <script src="{{url('js/form_validation.js')}}"></script>
    <script src="{{url('js/kontakt.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="produkt-page">
    <div class="produkt-page-image">
        <img src="{{url('storage/'.$produkt->obrazok)}}" alt="{{$produkt->nazov}}" width="270" height="170">
    </div>
    <div class="produkt-page-data">
        <div class="produkt-page-data-name">
            <p> {{$produkt->nazov}} </p>
        </div>
        <div class="produkt-page-data-price">
            @if ($produkt->zlava)
                <p> <s>{{$produkt->cena}} €</s> {{$produkt->cena - $produkt->zlava}} €</p>
            @else
                <p> {{$produkt->cena}} €</p>
            @endif
        </div>
        <div class="produkt-page-data-naSklade">
            <p> Na sklade: {{$produkt->na_sklade}} ks </p>
        </div>
        <div class="produkt-page-data-description">
            <p> {{$produkt->popis}} </p>
        </div>
        <div class="produkt-page-data-button">
            <button class="produkt-page-data-button"><a href="{{ route('app_kosik', ['id' => $produkt->id]) }}">Pridať do košíka</a></button>
        </div>
    </div>
</div>
@include('footer')
</body>
</html>
