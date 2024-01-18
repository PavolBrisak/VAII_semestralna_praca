<div class="account-container" id="objednavka">
    <div class="account-content">
        <div class="account-products-in-order-header">
            <h1>Objednávka číslo - {{ $objednavka->id }}, Používateľ - {{ $objednavka->user->name }} {{ $objednavka->user->surname }}
                , Stav - {{ $objednavka->status }}</h1>
        </div>
        <div class="account-products-in-order-body">
            <div class="account-products-in-order-body-item">
                <h2>Produkty v objednávke</h2>
                <table>
                    <tr>
                        <th>Názov</th>
                        <th>Počet</th>
                        <th>Cena</th>
                    </tr>
                    @foreach($objednavka->produkt_v_objednavke as $product)
                        <tr>
                            <td>{{ $product->nazov }}</td>
                            <td>{{ $product->mnozstvo }}</td>
                            <td>{{ $product->cena * $product->mnozstvo }} €</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="change-status-form">
                <form data-order-id="{{ $objednavka->id }}" onsubmit="return updateOrderStatus(this)" method="POST">
                    @csrf
                    <label for="status">Zmeniť stav objednávky:</label>
                    <select name="status" id="status">
                        <option value="Vytvorená" {{ $objednavka->status == 'Vytvorená' ? 'selected' : '' }}>Vytvorená</option>
                        <option value="Vybavujeme" {{ $objednavka->status == 'Vybavujeme' ? 'selected' : '' }}>Vybavujeme</option>
                        <option value="Ukončená" {{ $objednavka->status == 'Ukončená' ? 'selected' : '' }}>Ukončená</option>
                    </select>
                    <button type="submit">Uložiť</button>
                </form>
            </div>
        </div>
    </div>
</div>
