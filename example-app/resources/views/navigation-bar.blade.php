<div class="navigation-bar" id="navigation-bar">
    <ul class="navigation-bar-list">
        <li>
            <div class="kategorie-dropdown">
                <a href="#"><i class="bi bi-bookmark"></i>
                    Kategórie</a>
                <div class="kategorie-dropdown-content">
                    <a href="#">Kvetinky</a>
                    <a href="#">Jedlo</a>
                    <a href="#">Pucky</a>
                    <a href="#">Tvary</a>
                    <a href="#">Vianočné</a>
                    <a href="#">Srdiečka</a>
                    <a href="#">Smajlíky</a>
                    <a href="#">Pride</a>
                    <a href="#">Kamienky</a>
                    <a href="#">Memes</a>
                    <a href="#">Ostatné</a>
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
