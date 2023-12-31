<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <li>Zlacnené produkty</li>
    </ul>
</div>
<div class="produkt-form">
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/pride/pride-srdiecka.jpg')}}"
                                                      alt="Pride srdiečka" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Pride srdiečka</div>
        <div class="produkt-data"><s>1,90 €</s> 1,70 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/memes/LOL-face.jpg')}}" alt="LOL Face"
                                                      width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">LOL Face</div>
        <div class="produkt-data"><s>2,30 €</s> 2,00 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/kvetinky/tyrkysove-kvietky.jpg')}}"
                                                      alt="Tyrkysové kvetinky" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Tyrkysové kvetinky</div>
        <div class="produkt-data"><s>2,00 €</s> 1,75 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/vianocne/vianocne-gule-cervene.jpg')}}"
                                                      alt="Vianočné gule červené" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Vianočné gule červené</div>
        <div class="produkt-data"><s>2,00 €</s> 1,80 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
</div>
<div class="podnadpis">
    <ul>
        <li>Novinky skladom</li>
    </ul>
</div>
<div class="produkt-form">
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/kvetinky/bielo-fialove-kvietky.jpg')}}" alt="Bielo-fialové kvetinky" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Bielo-fialové kvetinky</div>
        <div class="produkt-data">1,70 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/smajliky/pacman.jpg')}}" alt="Pacman" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Pacman</div>
        <div class="produkt-data">1,40 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/memes/girl-face.jpg')}}" alt="Girl face" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Girl face</div>
        <div class="produkt-data">1,75 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/srdiecka/zlomene-srdce.jpg')}}" alt="Zlomené srdce" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Zlomené srdce</div>
        <div class="produkt-data">1,80 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/ostatne/fuzy.jpg')}}" alt="Fúzy" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Fúzy</div>
        <div class="produkt-data">1,90 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/kvetinky/biele-kvietky.jpg')}}" alt="Biele kvietky" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Biele kvietky</div>
        <div class="produkt-data">1,50 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
    <div class="produkt">
        <div class="produkt-obrazok"><a href="#"><img src="{{url('images/kategorie/kvetinky/cervene-kvetinky.jpg')}}" alt="Červené kvetinky" width="270"
                                                      height="170"></a></div>
        <div class="produkt-data">Červené kvetinky</div>
        <div class="produkt-data">1,50 €</div>
        <div class="produkt-button">
            <button class="produkt-button">Zobraziť viac</button>
        </div>
    </div>
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
