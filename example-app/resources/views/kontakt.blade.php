<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <script src="{{url('js/form_validation.js')}}"></script>
    <script src="{{url('js/kontakt.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>

</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="kontakt-nadpis">
    <form name="kontaktForm" class="kontakt-form" onsubmit="return validateFormKontakt()" action="{{route('app_kontakt')}}" method="post">
        @csrf
        <ul>
            <li>Kontaktuje nás</li>
            <li><div class="spolusu"><label for="meno">Meno</label><span class="form-error" id="form-error-meno" hidden>Meno musí začínať veľkým písmenom</span></div>
                <input type="text" id="meno" name="meno" oninput="checkMeno()"></li>
            <li><div class="spolusu"><label for="priezvisko">Priezvisko</label><span class="form-error" id="form-error-priezvisko" hidden>Priezvisko musí začínať veľkým písmenom</span></div>
                <input type="text" id="priezvisko" name="priezvisko" oninput="checkPriezvisko()"></li>
            <li><div class="spolusu"><label for="email">Email</label><span class="form-error" id="form-error-email" hidden>Neplatný email</span></div>
                <input type="text" id="email" name="email" onblur="checkEmail()"></li>
            <li><label for="sprava">Správa</label>
                <textarea id="sprava" name="sprava" ="adjustFormHeight()"></textarea></li>
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

