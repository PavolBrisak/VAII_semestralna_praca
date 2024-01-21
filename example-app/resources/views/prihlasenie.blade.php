<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Prihlásenie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/prihlasenie.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <script src="{{url('js/form_validation.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
@if ($success ?? '')
    <div class="alert-danger">
        <ul>
            <li>{{$success}}</li>
        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="prihlasenie-nadpis">
    <div class="prihlasenie">
        <img src="{{url('images/prihlasenie.png')}}" alt="Náušky">
        <form class="prihlasenie-form" onsubmit="return validateFormPrihlasenie()" action="{{route('app_prihlasenie')}}" method="post">
            @csrf
            <ul>
                <li>Prihlásenie</li>
                <li><div class="spolusu"><label for="email">Email</label><span class="form-error" id="form-error-email" hidden>Neplatný email</span></div>
                    <input type="text" id="email" name="email" onblur="checkEmail()" value="{{old('email')}}"></li>
                <li><label for="password">Heslo</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}">
                </li>
                <li><button class="send-button" type="submit">Prihlásiť sa</button></li>
                <li><a href="{{route('app_registracia')}}">Nemáte účet? Vytvorte si ho tu</a></li>
                <li><a href="{{route('app_zabudnute-heslo')}}">Zabudnuté heslo?</a></li>
            </ul>
        </form>
    </div>
</div>
<div class="doplnenie"></div>
@include('footer')
</body>
</html>
