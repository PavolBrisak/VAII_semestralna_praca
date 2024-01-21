<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Upraviť produkt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{url('js/ajax.js')}}"></script>
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/moj-ucet.css')}}">
    <link rel="stylesheet" href="{{url('styles/filtrovanie.css')}}">
    <link rel="stylesheet" href="{{url('styles/paginate.css')}}">
    <link rel="stylesheet" href="{{url('styles/upravit-produkt.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Upraviť produkt</p>
</div>
<div class="filtrovanie">
    <div class="filter">
        <form id="filterForm">
            <div class="form-group">
                <label for="kategorie">Kategorie:</label>
                <select name="kategorie" id="kategorie">
                    <option value="Všetky">Všetky</option>
                    <option value="Kvetinky">Kvetinky</option>
                    <option value="Jedlo">Jedlo</option>
                    <option value="Pucky">Pucky</option>
                    <option value="Tvary">Tvary</option>
                    <option value="Vianočné">Vianočné</option>
                    <option value="Srdiečka">Srdiečka</option>
                    <option value="Smajlíky">Smajlíky</option>
                    <option value="Pride">Pride</option>
                    <option value="Kamienky">Kamienky</option>
                    <option value="Memes">Memes</option>
                    <option value="Ostatné">Ostatné</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cena">Cena:</label>
                <input type="range" name="cena" id="cena" min="0" max="50" value="0" step="0.1">
                <span id="cenaValue">0 €</span>
            </div>

            <div class="form-group">
                <label for="onSale">Je v zľave:</label>
                <input type="checkbox" name="onSale" id="onSale">
            </div>

            <div class="form-group">
                <button type="button" onclick="filterProducts(this)">Filtrovat</button>
            </div>
        </form>
    </div>
    @include('products_partial')
</div>
@include('footer')
</body>
</html>
