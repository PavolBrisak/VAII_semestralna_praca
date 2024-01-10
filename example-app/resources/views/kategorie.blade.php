<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategórie</title>
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
    <p>Kategória - {{$kategoria}}</p>
</div>
<div class="produkt-form">
    @foreach($produkty as $produkt)
        <div class="produkt">
            <div class="produkt-obrazok"><a href="{{ route('app_produkt', ['id' => $produkt->id]) }}"><img
                        src="{{url('storage/'.$produkt->obrazok)}}"
                        alt="{{$produkt->nazov}}" width="270"
                        height="170"></a></div>
            <div class="produkt-data">{{$produkt->nazov}}</div>
            @if ($produkt->zlava)
                <div class="produkt-data"><s>{{$produkt->cena}} €</s> {{$produkt->cena - $produkt->zlava}} €</div>
            @else
                <div class="produkt-data">{{$produkt->cena}} €</div>
            @endif
            <div class="produkt-button">
                <button class="produkt-button">Zobraziť viac</button>
            </div>
        </div>
    @endforeach
</div>
@include('footer')
</body>
</html>
