<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prihlasenie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/prihlasenie.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <script src="{{url('js/form_validation.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="prihlasenie-nadpis">
    <div class="prihlasenie">
        <img src="{{url('images/prihlasenie.png')}}" alt="Náušky">
        <form class="prihlasenie-form" onsubmit="return validateFormPrihlasenie()">
            <ul>
                <li>Prihlásenie</li>
                <li><label for="email">Email<span class="form-error" id="form-error-email" hidden>Neplatný email</span></label>
                    <input type="text" id="email" name="email" onblur="checkEmail()"></li>
                <li><label for="password">Heslo</label>
                    <input type="password" id="password" name="password"></li>
                <li><button class="send-button">Prihlásiť sa</button></li>
                <li><a href="{{route('app_registracia')}}">Nemáte účet? Vytvorte si ho tu</a></li>
                <li><a href="#">Zabudnuté heslo?</a></li> {{--TODO zabudnute heslo--}}
            </ul>
        </form>
    </div>
</div>
<div class="doplnenie"></div>
@include('footer')
</body>
</html>
