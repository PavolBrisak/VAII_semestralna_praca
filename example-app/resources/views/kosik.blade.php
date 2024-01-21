<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Košík</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('styles/hlavna-stranka.css') }}">
    <link rel="stylesheet" href="{{ url('styles/kosik.css') }}">
    <link rel="stylesheet" href="{{ url('styles/kontakt.css') }}">
    <link rel="stylesheet" href="{{ url('styles/registracia.css') }}">
    <link rel="stylesheet" href="{{ url('styles/kosik.css') }}">
    <script src="{{ url('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ url('js/ajax.js') }}"></script>
    <script src="{{ url('js/form_validation.js') }}"></script>
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
            <div class="cart-item">
                <p>Názov produktu: {{ $cartItem->nazov }}</p>
                <p>Počet kusov:
                    <label>
                        <input id="mnozstvo" type="number" min="1" value="{{ $cartItem->mnozstvo }}" oninput="updateQuantity(this)" class="quantity-input" data-product-id="{{ $cartItem->id }}" data-product-name="{{ $cartItem->nazov }}">
                        <span class="form-error" id="form-error-mnozstvo" hidden>Neplatné množstvo</span>
                    </label>
                </p>
                <p>Celková cena: {{ $cartItem->cena * $cartItem->mnozstvo }} €</p>
                <a class="delete-item" href="{{ route('app_vymazat_z_kosika', ['id' => $cartItem->id]) }}">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        @endforeach
        <div class="cart-total">
            <p>Celková suma: {{ $totalPrice }} €</p>
        </div>
        <form class="cart-container-button" onsubmit="return validateSendOrder()" action="{{ route('app_vytvor_objednavku') }}">
            <button class="cart-container-button-large" id="cart-container-button" type="submit"><a>Objednať</a>
            </button>
        </form>
    @else
        <p class="empty-cart">Váš košík je prázdny. Nechcete si <a href="{{ route('app_index') }}">vybrať produkt</a>?</p>
    @endif
</div>
@include('footer')
</body>
</html>
