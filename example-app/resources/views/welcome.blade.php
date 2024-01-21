<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Sisinkine náušky</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="uvodne-obrazky">
    <div class="uvodne-obrazky-content">
        <div class="uvodne-obrazky-column">
            <a href="#">
                <img src="{{url('images/najpredavanejsie.jpg')}}" alt="Najpredávanejšie produkty">
            </a>
        </div>
        <div class="uvodne-obrazky-column">
            <a href="#">
                <img src="{{url('images/na-sebe/fialove-nasebe.jpg')}}" alt="Produkt fialové náušky">
            </a>
        </div>
        <div class="uvodne-obrazky-column">
            <a href="#">
                <img src="{{url('images/na-sebe/vianocne-nasebe.jpg')}}" alt="Produkt vianočné náušky">
            </a>
        </div>
    </div>
</div>
<div class="podnadpis">
    <ul>
        <li>Náhodný výber</li>
    </ul>
</div>
<div class="produkt-form">
    @foreach($produktyNahodnyVyber as $produkt)
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
</div>
<div class="podnadpis">
    <ul>
        <li>Novinky skladom</li>
    </ul>
</div>
<div class="produkt-form">
    @foreach($produktyNovinky as $produkt)
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
</div>
<div class="benefit-uvod">
    <div class="benefit-item">
        <div class="benefit-obrazok"><img src="{{url('images/doprava-zadarmo.png')}}" alt="Doprava zadarmo pri nákupe nad 15 €">
        </div>
        <div class="benefit-content">
            <strong class="benefit-nazov">Doprava zadarmo</strong>
            <div class="benefit-data">Doprava zadarmo pri nákupe nad 15 €</div>
        </div>
    </div>
    <div class="benefit-item">
        <div class="benefit-obrazok"><img src="{{url('images/rodinna-firma.png')}}" alt="Rodinná firma s tradíciou od roku 2018">
        </div>
        <div class="benefit-content">
            <strong class="benefit-nazov">Rodinná firma</strong>
            <div class="benefit-data">Rodinná firma s tradíciou od roku 2018</div>
        </div>
    </div>
    <div class="benefit-item">
        <div class="benefit-obrazok"><img src="{{url('images/rychle-dorucenie.png')}}"
                                          alt="Tovar na sklade odosielame do 24 hodín">
        </div>
        <div class="benefit-content">
            <strong class="benefit-nazov">Odosielame do 24 hodín</strong>
            <div class="benefit-data">Tovar na sklade odosielame do 24 hodín</div>
        </div>
    </div>
</div>
@include('footer')
</body>
</html>
