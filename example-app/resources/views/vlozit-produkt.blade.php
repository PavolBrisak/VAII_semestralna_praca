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
    <div class="alert-danger">
        <ul>
            <li>Došlo ku chybe pri odoslaní správy</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="kontakt-nadpis">
    <form name="kontaktForm" class="kontakt-form" onsubmit="return validateFormKontakt()" action="{{ route('app_kontakt') }}" method="post" enctype="multipart/form-data">
        @csrf
        <ul>
            <li>Vytvorte nový produkt</li>
            <li>
                <label for="name">Názov produktu</label>
                <input type="text" id="name" name="name" required>
            </li>
            <li>
                <label for="price">Cena</label>
                <input type="text" id="price" name="price" required>
            </li>
            <li>
                <label for="category">Kategória</label>
                <input type="text" id="category" name="category" required>
            </li>
            <li>
                <label for="picture">Obrázok</label>
                <input type="file" id="picture" name="picture">
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

