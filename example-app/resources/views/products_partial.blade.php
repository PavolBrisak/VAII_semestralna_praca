@foreach($produkty as $produkt)
    <div class="produkt">
        <div class="produkt-obrazok"><a href="{{ route('app_upravit_produkt_id_index', ['id' => $produkt->id]) }}"><img
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
            <button class="produkt-button" href="{{ route('app_upravit_produkt_id_index', ['id' => $produkt->id]) }}">
                Zobraziť viac
            </button>
        </div>
    </div>
@endforeach
