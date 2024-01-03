<div class="navigation-bar" id="navigation-bar">
    <ul class="navigation-bar-list">
        <li>
            <div class="kategorie-dropdown">
                <a href="#"><i class="bi bi-bookmark"></i>
                    Kategórie</a>
                <div class="kategorie-dropdown-content">
                    <a href="{{route('app_kategoria', ['kategoria' => 'kvetinky'])}}">Kvetinky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'jedlo'])}}">Jedlo</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'pucky'])}}">Pucky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'tvary'])}}">Tvary</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'vianocne'])}}">Vianočné</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'srdiecka'])}}">Srdiečka</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'smajliky'])}}">Smajlíky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'pride'])}}">Pride</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'kamienky'])}}">Kamienky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'memes'])}}">Memes</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'ostatne'])}}">Ostatné</a>
                </div>
            </div>
        </li>
        <li><a href="#">Výpredaj</a></li>
        <li><a href="#">Najpredávanejšie náušky</a></li>
        <li><a href={{route('app_reklamacie')}}>Reklamácie</a></li>
        <li><a href={{route('app_doprava')}}>Doprava a platba</a></li>
        <li><a href={{route('app_kontakt')}}>Kontakty</a></li>
        @auth
            @if(auth()->user()->getEmail() == 'admin@gmail.com')
                <li class="navigation-bar-list-admin"><a class="navigation-bar-list-admin" href="{{route('app_vlozit_produkt') }}">Vložiť produkt</a></li>
            @endif
        @endauth
    </ul>
</div>
