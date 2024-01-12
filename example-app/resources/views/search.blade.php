<div class="search" id="search">
    <a class="logo" href="{{ route('app_index') }}"><img src="{{ url('images/logo.png') }}" alt="logo"></a>
    <form action="{{ route('app_vyhladaj')}}" method="GET" class="search-form">
        @csrf
        <label for="searchInput"><input type="text" name="search" id="searchInput" class="search-bar" placeholder="Vyhľadajte daný tovar v celom obchode tu.."></label>
        <button type="submit" class="search-icon"><img src="{{ url('images/magnifying-glass.avif') }}" class="search-icon" alt="Search icon"></button>
    </form>
    <div class="dropdown" id="dropdown">
        <a href="#" class="account-logo"><i class="bi bi-person" onclick="showDropdownUser()"></i></a>
        <div class="dropdown-content">
            @guest
                <a href="{{ route('app_prihlasenie') }}" class="dropdown-content-item">Prihlásiť sa</a>
                <a href="{{ route('app_registracia') }}" class="dropdown-content-item">Vytvoriť si účet</a>
            @else
                <a href="{{ route('app_odhlasenie') }}" class="dropdown-content-item">Odhlásiť sa</a>
                <a href="{{ route('app_ucet') }}" class="dropdown-content-item">Môj účet</a>
            @endguest
        </div>
    </div>
    <a href="{{ route('app_kosik') }}" class="cart-logo"><i class="bi bi-cart"></i></a>
</div>
