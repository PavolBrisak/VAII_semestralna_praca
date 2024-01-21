<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{url('js/ajax.js')}}"></script>
    <script src="{{url('js/form_validation.js')}}"></script>
    <script src="{{url('js/kontakt.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            <li>Došlo ku chybe pri pridávaní produktu do košíka</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="produkt-page">
    <div class="produkt-page-image">
        <img src="{{url('storage/'.$produkt->obrazok)}}" alt="{{$produkt->nazov}}" width="270" height="170">
    </div>
    <div class="produkt-page-data">
        <div class="produkt-page-data-name">
            <p> {{$produkt->nazov}} </p>
        </div>
        <div class="produkt-page-data-price">
            @if ($produkt->je_v_zlave)
                <p><s>{{$produkt->cena}} €</s> {{$produkt->cena_zlava}} €</p>
            @else
                <p> {{$produkt->cena}} €</p>
            @endif
        </div>
        <div class="produkt-page-data-naSklade">
            <p>
            <span data-product-id="{{ $produkt->id }}" onclick="refreshNaSklade(this)">
                <i class="bi-arrow-clockwise"></i>
            </span>
                Na sklade: <span id="pocet">{{ $produkt->na_sklade }}</span> ks
            </p>
        </div>
        <div class="produkt-page-data-description">
            <p> {{$produkt->popis}} </p>
        </div>
        @if ($produkt->na_sklade > 0)
        <div class="produkt-page-data-button">
            <button class="produkt-page-data-button"><a
                    href="{{ route('app_pridaj_do_kosika', ['id' => $produkt->id]) }}">Pridať do košíka</a></button>
        </div>
        @else
            <div class="produkt-page-vypredane">
                <p class="produkt-page-data-vypredane">Vypredané</p>
            </div>
        @endif
    </div>
</div>
@include('footer')
</body>
</html>
