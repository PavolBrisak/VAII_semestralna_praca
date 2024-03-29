<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Výpredaj</title>
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
<div class="nadpis">
    <p>Výpredaj</p>
</div>
<div class="produkt-form">
    @if(!$produkty->isEmpty())
        @foreach($produkty as $produkt)
            <div class="produkt">
                <div class="produkt-obrazok"><a href="{{ route('app_produkt', ['id' => $produkt->id]) }}"><img
                            src="{{url('storage/'.$produkt->obrazok)}}"
                            alt="{{$produkt->nazov}}" width="270"
                            height="170"></a></div>
                <div class="produkt-data">{{$produkt->nazov}}</div>
                @if ($produkt->je_v_zlave)
                    <div class="produkt-data"><s>{{$produkt->cena}} €</s> {{$produkt->cena_zlava}} €</div>
                @else
                    <div class="produkt-data">{{$produkt->cena}} €</div>
                @endif
                <div class="produkt-button">
                    <button class="produkt-button">Zobraziť viac</button>
                </div>
            </div>
        @endforeach
    @else
        <p>Žiadne produkty nie sú zlacnené</p>
    @endif
</div>
@include('footer')
</body>
</html>
