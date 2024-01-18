<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upraviť produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{url('js/ajax.js')}}"></script>
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/moj-ucet.css')}}">
    <link rel="stylesheet" href="{{url('styles/upravit-produkt.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="alert-success" id="success">
    <ul>
        <li>Produkt bol upravený</li>
    </ul>
</div>
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            <li>Došlo ku chybe pri upravovaní produktu</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="nadpis">
    <p>Upraviť produkt</p>
</div>
<div class="kontakt-nadpis">
    <form name="kontaktForm" class="kontakt-form" onsubmit="return validateFormUpravitProdukt(this)">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $produkt->id }}">
        <ul>
            <li>Upravte produkt</li>
            <li>
                <label for="name">Názov produktu</label>
                <input type="text" id="name" name="name" value="{{$produkt->nazov}}" required>
            </li>
            <li>
                <label for="price">Cena</label>
                <input type="text" id="price" name="price" value="{{$produkt->cena}}" required>
            </li>
            <li>
                <label for="category">Kategória</label>
                <input type="text" id="category" name="category" value="{{$produkt->kategoria}}" required>
            </li>
            <li>
                <label for="amount">Množstvo</label>
                <input type="text" id="amount" name="amount" value="{{$produkt->na_sklade}}" required>
            </li>
            <li>
                <label for="description">Popis</label>
                <input type="text" id="description" name="description" value="{{$produkt->popis}}" required>
            <li>
            <li>
                <label for="onSale">Je v zľave:</label>
                <input type="checkbox" name="onSale" id="onSale" {{$produkt->je_v_zlave ? 'checked' : ''}}>
            </li>
            <li>
                <label for="salePrice">Zľavnená cena</label>
                <input type="text" id="salePrice" name="salePrice" value="{{$produkt->cena_zlava}}">
            </li>
            <li>
                <button class="send-button" type="submit">Odoslať</button>
            </li>
        </ul>
    </form>
</div>
<div class="filler"></div>
@include('footer')
</body>
</html>
