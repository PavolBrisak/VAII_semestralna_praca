<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Môj účet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/zabudnute-heslo.css')}}">
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
            <li>Došlo ku chybe pri odoslaní e-mailu. Skúste znova</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="heslo-nadpis">
    <form name="kontaktForm" class="heslo-form" onsubmit="return validateFormKontakt()" action="{{route('app_zabudnute-heslo')}}" method="post">
        @csrf
        <ul>
            <li>Zadajte svoj e-mail</li>
            <li><div class="spolusu"><label for="email">Email</label><span class="form-error" id="form-error-email" hidden>Neplatný email</span></div>
                <input type="text" id="email" name="email" onblur="checkEmail()" value="{{old('email')}}"></li>
            <li>
                <button class="send-button" type="submit">Odoslať</button>
            </li>
        </ul>
    </form>
</div>
<div class="filler-heslo"></div>
@include('footer')
</body>
</html>
