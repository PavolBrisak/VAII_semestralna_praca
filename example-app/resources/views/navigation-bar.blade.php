<div class="navigation-bar" id="navigation-bar">
    <ul class="navigation-bar-list">
        <li>
            <div class="kategorie-dropdown">
                <a><i class="bi bi-bookmark"></i>
                    Kategórie</a>
                <div class="kategorie-dropdown-content">
                    <a href="{{route('app_kategoria', ['kategoria' => 'Kvetinky'])}}">Kvetinky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Jedlo'])}}">Jedlo</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Pucky'])}}">Pucky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Tvary'])}}">Tvary</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Vianočné'])}}">Vianočné</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Srdiečka'])}}">Srdiečka</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Smajlíky'])}}">Smajlíky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Pride'])}}">Pride</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Kamienky'])}}">Kamienky</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Memes'])}}">Memes</a>
                    <a href="{{route('app_kategoria', ['kategoria' => 'Ostatné'])}}">Ostatné</a>
                </div>
            </div>
        </li>
        <li><a href="{{route('app_vypredaj')}}">Výpredaj</a></li>
        <li><a href="{{route('app_najpredavanejsie')}}">Najpredávanejšie náušky</a></li>
        <li><a href={{route('app_reklamacie')}}>Reklamácie</a></li>
        <li><a href={{route('app_doprava')}}>Doprava a platba</a></li>
        <li><a href={{route('app_kontakt')}}>Kontakty</a></li>
        @auth
            @if(auth()->user()->email == 'admin@gmail.com')
                <li class="navigation-bar-list-admin"><a class="navigation-bar-list-admin" href="{{route('app_upravit_objednavky_index') }}">Upraviť objednávky</a></li>
                <li class="navigation-bar-list-admin"><a class="navigation-bar-list-admin" href="{{route('app_upravit_produkt_index') }}">Upraviť produkt</a></li>
                <li class="navigation-bar-list-admin"><a class="navigation-bar-list-admin" href="{{route('app_vlozit_produkt') }}">Vložiť produkt</a></li>
            @endif
        @endauth
    </ul>
</div>
