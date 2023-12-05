<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/zmena-hesla.css')}}">
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
            <li>Došlo ku chybe pri zmene hesla</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="kontakt-nadpis">
    <form name="kontaktForm" class="kontakt-form" onsubmit="return validateFormZmenaHesla()" action="{{route('app_zmena_hesla')}}" method="post">
        @csrf
        <ul>
            <li>Zmente si heslo</li>
            <li><div class="spolusu"><label for="heslo">Nové heslo</label><span class="form-error" id="form-error-heslo" hidden>Slabé heslo</span></div>
                <input type="password" id="heslo" name="heslo" oninput="checkHeslo()">
            </li>
            <li><div class="spolusu"><label for="heslo_potvrd">Znova zadajte nové heslo</label></div>
                <input type="password" id="heslo_potvrd" name="heslo_potvrd">
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

