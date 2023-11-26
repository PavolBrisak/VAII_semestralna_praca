<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/kontakt.css')}}">
</head>
<body>
<div class="header">
    <ul>
        <li class="header">
            <a class="header-zoznam-zelani" href="#">
                Môj zoznam želaní
            </a>
        </li>
        <li>
            <a class="header-kontaktujte-nas" href="kontakt.html">
                Kontaktujte nás
            </a>
        </li>
    </ul>
</div>
<div class="search">
    <a class="logo" href="hlavna-stranka.html"><img src="{{url('images/logo.png')}}" alt="logo"></a>
    <input type="text" class="search-bar" placeholder="Vyhľadajte daný tovar v celom obchode tu..">
    <a href="#" class="search-icon"><img src="{{url('images/magnifying-glass.avif')}}" class="search-icon"
                                         alt="Search icon"></a>
    <div class="dropdown">
        <a href="#" class="account-logo"><i class="bi bi-person"></i></a>
        <div class="dropdown-content">
            <a href="prihlasenie.html" class="dropdown-content-item">Prihlásiť sa</a>
            <a href="vytvorenie-uctu.html" class="dropdown-content-item">Vytvoriť si účet</a>
        </div>
    </div>
    <a href="#" class="cart-logo"><i class="bi bi-cart"></i></a>
</div>
<div class="navigation-bar">
<div class="kontakt-nadpis">
    <div class="kontakt-form">
        <ul>
            <li>Kontaktuje nás</li>
            <li><label for="meno">Meno</label>
                <input type="text" id="meno" name="meno"></li>
            <li><label for="priezvisko">Priezvisko</label>
                <input type="password" id="priezvisko" name="priezvisko"></li>
            <li><label for="email">Email</label>
                <input type="text" id="email" name="email"></li>
            <li><label for="sprava">Správa</label>
                <textarea id="sprava" name="sprava"></textarea></li>
            <li>
                <button class="send-button">Odoslať</button>
            </li>
        </ul>
    </div>
</div>
<div class="filler"></div>
<div class="footer">
    <div class="footer-data">
        <ul>
            <li>O nákupe</li>
            <li><a href="doprava.html">Doprava a platba</a></li>
            <li><a href="prihlasenie.html">Prihlásiť sa</a></li>
            <li><a href="vytvorenie-uctu.html">Registrácia</a></li>
            <li><a href="reklamacie.html">Reklamácie</a></li>
        </ul>
    </div>
    <div class="footer-data">
        <ul>
            <li>O našom obchode</li>
            <li><a>Výpredaj</a></li>
            <li><a>Kategórie</a></li>
            <li><a href="kontakt.html">Kontakty</a></li>
            <li><br></li>
        </ul>
    </div>
    <div class="footer-data">
        <ul>
            <li>Sisinkine náušky</li>
            <li><p>Ponúkame široký výber ručne-vyrobených náušníc, ktoré sú špeciálne navrhnuté a vyrobené s láskou a
                    starostlivosťou. Každý kus je jedinečný a nesie v sebe kus umenia a originality. Nechajte svoju osobnosť
                    žiariť a doplňte svoj štýl týmito nádhernými šperkami.</p></li>
            <li><br></li>
        </ul>
    </div>
    <div class="footer-data">
        <ul>
            <li>Kontakt</li>
            <li>V prípade otázok nás prosím kontaktujte cez <a href="kontakt.html">kontaktný formulár</a> <br>alebo nám
                napíšte na email <strong>sisinkine.nausky@gmail.com</strong></li>
        </ul>
    </div>
</div>
</body>
</html>

