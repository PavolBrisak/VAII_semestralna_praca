<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Košík</title>
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
    <p>Košík</p>
</div>
<div class="cart-container">
    @if($cartItems->count() > 0)
        @foreach($cartItems as $cartItem)
            <div>
                <p>Názov produktu : {{ $cartItem->nazov }}</p>
                <p>Počet kusov : {{ $cartItem->mnozstvo }}</p>
                <p>Celková cena : {{ $cartItem->cena * $cartItem->mnozstvo }} €</p>
            </div>
        @endforeach
        <div class="cart-container-button">
            <button class="cart-container-button"><a href="{{ route('app_vytvor_objednavku') }}">Objednať</a></button>
        </div>
    @else
        <p>Váš košík je prázdny.</p>
    @endif
</div>
@include('footer')
</body>
</html>
