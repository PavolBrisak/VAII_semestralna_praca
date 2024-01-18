<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upraviť objednávky</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{url('js/ajax.js')}}"></script>
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/moj-ucet.css')}}">
    <link rel="stylesheet" href="{{url('styles/filtrovanie.css')}}">
    <link rel="stylesheet" href="{{url('styles/paginate.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Upraviť objednávky</p>
</div>
<div class="filtrovanie">
    <div class="filter">
        <form id="filterForm">
            <div class="form-group">
                <button type="button" onclick="filterOrdersDate(this)">Filtruj podľa dátumu</button>
            </div>
            <div class="form-group" onchange="filterOrdersStatus(this)">
                <label for="status">Stav:</label>
                <select name="status" id="status">
                    <option value="Všetky">Všetky</option>
                    <option value="Vytvorená">Vytvorená</option>
                    <option value="Vybavujeme">Vybavujeme</option>
                    <option value="Ukončená">Ukončená</option>
                </select>
            </div>
            <div class="form-group" oninput="filterOrdersCustomer(this)">
                <label for="userInput">Meno alebo ID používateľa:</label>
                <input type="text" name="userInput" id="userInput">
            </div>
            <div class="form-group" oninput="filterOrdersById(this)">
                <label for="oderInput">ID objednávky:</label>
                <input type="text" name="oderInput" id="oderInput">
            </div>
        </form>
    </div>
    @include('upravit-objednavky-partial')
    <div class="pagination-container">
        {{ $objednavky->links() }}
    </div>
</div>
@include('footer')
</body>
</html>
