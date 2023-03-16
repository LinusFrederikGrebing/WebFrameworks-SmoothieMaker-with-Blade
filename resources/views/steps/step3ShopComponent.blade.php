<x-guest-layout>
    <div class="container">
        @include('layouts.groesse')
        <div class="w-full">
            <div class="flex">
                <button onclick="window.location='{{ route('showFruits') }}'"
                    class="flex justify-center w-1/2 green-bg custom-btn">
                    Weitere Zutaten hinzufügen
                </button>
                <button onclick="removeAllAlert()" class="flex items-center justify-center w-1/2 red-bg custom-btn">
                    Alles aus dem Warenkorb entfernen
                </button>
            </div>
        </div>
        <div class="flex flex-col md:flex-row mt-4">
            <div class="w-full md:w-3/5">
                <div class="item-list-table">
                    <div class="v-card w-95 ml-4">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Preis</th>
                                    <th scope="col">Menge</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredients as $index => $item)
                                    <tr>
                                        <td><img src="/images/piece/{{ $item->options->image }}" class="table-img"></td>
                                        <td><span class="text-dark">{{ $item->name }}</span></td>
                                        <td> <span class="font-weight-bold"> {{ $item->price }}€</span></td>
                                        <td class="text-center" data-title="stock">
                                            <div class="flex">
                                                <button onclick="addSpecificOne('{{ $item->rowId }}', {{ $item->id }})"
                                                    class="btn increase">
                                                    <span class="material-symbols-outlined">
                                                        add
                                                    </span>
                                                </button>
                                                <span class="qty"
                                                    id='qty{{ $item->id }}'>{{ $item->qty }}</span>
                                                <button onclick="removeSpecificOne('{{ $item->rowId }}', {{ $item->id }})"
                                                    class="btn decrease">
                                                    <span class="material-symbols-outlined">
                                                        remove
                                                    </span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <button onclick="removeSpecificCart('{{ $item->rowId }}')">
                                                <span class="material-symbols-outlined">
                                                    delete
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button onclick="window.location='{{ route('showLiquids') }}'"
                        class="mt-6 ml-4 flex items-center justify-center w-95 green-bg custom-btn">
                        Flüssigkeit ändern
                    </button>
                    <div class="v-card w-95 mt-2 ml-4">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Preis</th>
                                    <th scope="col">Menge</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liquids as $index => $item)
                                    <tr>
                                        <td><img src="/images/piece/{{ $item->options->image }}" class="table-img">
                                        </td>
                                        <td><span class="text-dark">{{ $item->name }}</span></td>
                                        <td> <span class="font-weight-bold"> {{ $item->price }}€ / 50ml</span></td>
                                        <td class="text-center" data-title="stock">
                                            <div class="flex">
                                                <span class="qty"
                                                    id='qty{{ $item->id }}'>{{ $item->qty }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <button onclick="removeSpecificCart('{{ $item->rowId }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="">
                    <hr class="w-75">
                    <p>Total: <b id="subTotal">{{ Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</b></p>
                    <h5>Total inkl. MwSt: <b id="total">{{ Gloudemans\Shoppingcart\Facades\Cart::total() }}</b></h5>
                    <button class="custom-btn green-bg" role="button" onclick="getLiquidAndIngredientContent()">
                        Jetzt kaufen </button>
                </div>
            </div>
            <div class="w-full md:w-2/5">
                @include('layouts.mixer')
                @include('layouts.progressbar')
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    var bottle = {!! json_encode($bottle) !!};
    var ingredienteContent = [];
    var liquidContent = [];
    function getLiquidAndIngredientContent() {
        getCartContent(bottle);
    }
</script>
