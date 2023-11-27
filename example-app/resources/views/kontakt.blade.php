<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <script src="{{url('js/kontakt_form_validation.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="kontakt-nadpis">
    <form name="kontaktForm" class="kontakt-form" onsubmit="return validateForm()">
        <ul>
            <li>Kontaktuje nás</li>
            <li><label for="meno">Meno</label>
                <input type="text" id="meno" name="meno"></li>
            <li><label for="priezvisko">Priezvisko</label>
                <input type="text" id="priezvisko" name="priezvisko"></li>
            <li><label for="email">Email</label>
                <input type="text" id="email" name="email"></li>
            <li><label for="sprava">Správa</label>
                <textarea id="sprava" name="sprava"></textarea></li>
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

