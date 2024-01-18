<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Môj účet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/moj-ucet.css')}}">
    <link rel="stylesheet" href="{{url('styles/paginate.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="nadpis">
    <p>Moje objednávky</p>
</div>
<div class="account-container">
    <div class="account-sidebar">
        <ul>
            <li><a href="{{ route('app_ucet') }}">Môj účet</a></li>
            <li><a href="{{ route('app_moje_objednavky') }}">Moje objednávky</a></li>
            <li><a href="{{ route('app_zmena_mena') }}">Zmeniť meno</a></li>
            <li><a href="{{ route('app_zmena_hesla') }}">Zmeniť si heslo</a></li>
            <li><a href="{{ route('app_odhlasenie') }}">Odhlásiť sa</a></li>
            <li><a href="{{ route('app_zrusit_ucet_index') }}">Zrušiť účet</a></li>
        </ul>
    </div>
    <div class="account-content">
        @if ($objednavky->isEmpty())
            <div class="account-orders-null">
                <p>Nemáte žiadne objednávky</p>
            </div>
        @else
            <div class="account-orders">
                <table>
                    <tr>
                        <th>Číslo objednávky</th>
                        <th>Detail objednávky</th>
                        <th>Dátum objednávky</th>
                        <th>Cena</th>
                        <th>Stav</th>
                    </tr>
                    @foreach($objednavky as $objednavka)
                        <tr>
                            <td>{{ $objednavka->id }}</td>
                            <td><a href="{{ route('app_zobraz_objednavku', ['id' => $objednavka->id]) }}">Zobraziť
                                    objednávku</a></td>
                            <td>{{ $objednavka->created_at }}</td>
                            <td>{{ $objednavka->total_amount }} €</td>
                            <td>{{ $objednavka->status }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination-container">
                    {{ $objednavky->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@include('footer')
</body>
</html>
