<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vytvorenie uctu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <link rel="stylesheet" href="{{url('styles/registracia.css')}}">
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="vytvorenie-uctu-nadpis">
    <div class="vytvorenie-uctu">
        <img src="{{url('images/vytvorenie-uctu.png')}}" alt="Náušky">
        <div class="vytvorenie-uctu-form">
            <ul>
                <li>Vytvorte si účet</li>

                <li>Osobné informácie</li>
                <li><label for="meno">Meno</label>
                    <input type="text" id="meno" name="meno"></li>
                <li><label for="priezvisko">Priezvisko</label>
                    <input type="password" id="priezvisko" name="priezvisko"></li>
                <li><label for="dic">DIČ</label>
                    <input type="text" id="dic" name="dic"></li>

                <li>Prihlasovacie informácie</li>
                <li><label for="email">Email</label>
                    <input type="text" id="email" name="email"></li>
                <li><label for="heslo">Heslo</label>
                    <input type="password" id="heslo" name="heslo"></li>
                <li><label for="heslo_potvrd">Potvrďte heslo</label>
                    <input type="password" id="heslo_potvrd" name="heslo_potvrd"></li>

                <li><button class="send-button">Vytvoriť účet</button></li>
            </ul>
        </div>
    </div>
</div>
<div class="filler"></div>
@include('footer')
</body>
</html>
