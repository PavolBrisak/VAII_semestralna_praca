<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doprava a platba</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/doprava.css')}}">
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="velky-nadpis">
    <p>Doprava a platba</p>
</div>
<div class="doprava-a-platba-body">
    <p class="doprava-body-nadpis">Doprava</p>
    <ul>
        <li><strong>Packeta (Zásielkovňa)</strong>  - 2,99 € (nad 15 € doprava zadarmo)</li>
        <li><strong>Kuriér</strong> - 4,99 €</li>
        <li>Za nákup <strong>5+</strong> produktov, <strong>doprava zadarmo</strong> </li>
    </ul>
    <p class="platba-body-nadpis">Platba</p>
    <ul>
        <li><strong>Dobierka</strong> (1,5 € - limit obj. do 35 €)</li>
        <li><strong>platobná karta</strong> (VISA, VISA el., MasterCard, Maestro) alebo <strong>online prevod</strong> (Unicredit, Sporopay, Poštová banka, Tatra, VUB), Apple Pay</li>
    </ul>
</div>
<div class="doprava-obrazky">
    <div class="doprava-obrazky-item"><img src="{{url('images/dpdkurier.png')}}" alt="Doprava kuriérom"></div>
    <div class="doprava-obrazky-item"><img src="{{url('images/packeta.png')}}" alt="Doprava packetou"></div>
    <div class="doprava-obrazky-item"><img src="{{url('images/slovenska-posta.png')}}" alt="Doprava slovenskou poštou"></div>
    <div class="doprava-obrazky-item"><img src="{{url('images/platba-kartou.png')}}" alt="Platba kartou"></div>
</div>
@include('footer')
</body>
</html>
