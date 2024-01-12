<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Môj účet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/moj-ucet.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>

@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Môj účet</p>
</div>
<div class="account-container">
    <div class="account-sidebar">
        <ul>
            <li><a href="{{ route('app_ucet') }}">Môj účet</a></li>
            <li><a href="{{ route('app_moje_objednavky') }}">Moje objednávky</a></li>
            <li><a href="{{ route('app_zmena_mena') }}">Zmeniť meno</a></li>
            <li><a href="{{ route('app_zmena_hesla') }}">Zmeniť si heslo</a></li>
            <li><a href="{{ route('app_odhlasenie') }}">Odhlásiť sa</a></li>
            <li><a href="{{ route('app_zrusit_ucet_index') }}">Zrušiť účet</a></li>
        </ul>
    </div>
    <div class="account-content">
        <div class="account-content-body">
            <div class="account-content-body-item">
                <h2>Osobné informácie</h2>
                <p>Meno: {{ $user->name }}</p>
                <p>Priezvisko: {{ $user->surname }}</p>
                <p>Email: {{ $user->email }}</p>
            </div>
        </div>
    </div>
</div>
@include('footer')
</body>
</html>
