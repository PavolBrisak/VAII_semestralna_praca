<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
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
    @include('account-sidebar')
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
