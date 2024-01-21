<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Zmena mena</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/zmena-mena.css')}}">
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
            <li>Došlo ku chybe pri zmene mena</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="kontakt-nadpis">
    <form name="kontaktForm" class="kontakt-form" onsubmit="return validateFormZmenaMena()" action="{{route('app_zmena_mena')}}" method="post">
        @csrf
        <ul>
            <li>Zmente si meno</li>
            <li><div class="spolusu"><label for="meno">Nové meno</label><span class="form-error" id="form-error-meno" hidden>Meno musí začínať veľkým písmenom</span></div>
                <input type="text" id="meno" name="meno" oninput="checkMeno()" value="{{old('meno')}}">
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

