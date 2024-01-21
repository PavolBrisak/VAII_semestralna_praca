<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Vytvorenie uctu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
    <link rel="stylesheet" href="{{url('styles/registracia.css')}}">
    <script src="{{url('js/form_validation.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            <li>Došlo ku chybe pri registrácií</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="vytvorenie-uctu-nadpis">
    <div class="vytvorenie-uctu">
        <img src="{{url('images/vytvorenie-uctu.png')}}" alt="Náušky">
        <form class="vytvorenie-uctu-form" onsubmit="return validateFormRegistracia()" action="{{route('app_registracia')}}" method="post">
            @csrf
            <ul>
                <li>Vytvorte si účet</li>

                <li>Osobné informácie</li>
                <li><div class="spolusu"><label for="meno">Meno</label><span class="form-error" id="form-error-meno" hidden>Meno musí začínať veľkým písmenom</span></div>
                    <input type="text" id="meno" name="meno" oninput="checkMeno()" value="{{old('meno')}}"></li>
                <li><div class="spolusu"><label for="priezvisko">Priezvisko</label><span class="form-error" id="form-error-priezvisko" hidden>Priezvisko musí začínať veľkým písmenom</span></div>
                    <input type="text" id="priezvisko" name="priezvisko" oninput="checkPriezvisko()" value="{{old('priezvisko')}}"></li>

                <li>Prihlasovacie informácie</li>
                <li><div class="spolusu"><label for="email">Email</label><span class="form-error" id="form-error-email" hidden>Neplatný email</span></div>
                    <input type="text" id="email" name="email" onblur="checkEmail()" value="{{old('email')}}"></li>
                <li><div class="spolusu"><label for="heslo">Heslo</label><span class="form-error" id="form-error-heslo" hidden>Slabé heslo</span></div>
                    <input type="password" id="heslo" name="heslo" oninput="checkHeslo()" value="{{old('heslo')}}"></li>
                <li><label for="heslo_potvrd">Potvrďte heslo</label>
                    <input type="password" id="heslo_potvrd" name="heslo_potvrd" value="{{old('heslo_potvrd')}}"></li>

                <li><button class="send-button">Vytvoriť účet</button></li>
            </ul>
        </form>
    </div>
</div>
<div class="filler"></div>
@include('footer')
</body>
</html>
