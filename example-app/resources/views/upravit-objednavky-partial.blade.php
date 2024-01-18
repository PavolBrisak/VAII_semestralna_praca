<div class="account-content" id="objednavky">
    @if ($objednavky->count() === 0)
        <div class="account-orders-null">
            <p>Nemáte žiadne objednávky</p>
        </div>
    @else
        <div class="account-orders">
            <table>
                <tr>
                    <th>Číslo objednávky</th>
                    <th>Číslo používateľa</th>
                    <th>Meno používateľa</th>
                    <th>Upraviť objednávku</th>
                    <th>Dátum objednávky</th>
                    <th>Cena</th>
                    <th>Stav</th>
                </tr>
                @foreach($objednavky as $currentObjednavka)
                    <tr>
                        <td>{{ $currentObjednavka->id }}</td>
                        <td>{{ $currentObjednavka->customer_id }}</td>
                        <td>{{ $currentObjednavka->user->name . ' ' . $currentObjednavka->user->surname }}</td>
                        <td><a href="{{ route('app_upravit_objednavku', ['id' => $currentObjednavka->id]) }}">Upraviť
                                objednávku</a></td>
                        <td>{{ $currentObjednavka->created_at }}</td>
                        <td>{{ $currentObjednavka->total_amount }} €</td>
                        <td>{{ $currentObjednavka->status }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</div>
