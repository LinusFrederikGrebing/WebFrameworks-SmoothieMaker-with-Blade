<x-guest-layout>
    <div class="container mt-16">
        <div class="w-full flex">
            <div class="lg:w-4/6">
                @include('layouts.sizeComponent')
            </div>
            @auth
                <div class="lg:w-2/6">
                    <div class="flex mt-3">
                        <x-jet-input id="presetname-input" class="block mt-1 w-7/12" type="text" name="presetname" />
                        <div>
                            <x-jet-button class="mt-2"
                                onclick="storeAsPreset(document.getElementById('presetname-input').value)">
                                Preset erstellen!
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
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
            <div class="w-full md:w-4/6">
                <div class="item-list-table">
                    <div class="w-95 ml-4">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Preis</th>
                                    <th scope="col">Menge</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredients as $index => $item)
                                    <tr class="my-1">
                                        <td><img src="/images/piece/{{ $item->options->image }}" class="table-img"></td>
                                        <td><span class="text-dark">{{ $item->name }}</span></td>
                                        <td> <span class="font-weight-bold"> {{ $item->price }}€ / 50g</span></td>
                                        <td class="text-center" data-title="stock">
                                            <div class="flex">
                                                <button
                                                    onclick="addSpecificOne('{{ $item->rowId }}', {{ $item->id }})"
                                                    class="btn increase">
                                                    <span class="material-symbols-outlined">
                                                        add
                                                    </span>
                                                </button>
                                                <span class="qty"
                                                    id='qty{{ $item->id }}'>{{ $item->qty }}</span>
                                                <button
                                                    onclick="removeSpecificOne('{{ $item->rowId }}', {{ $item->id }})"
                                                    class="btn decrease">
                                                    <span class="material-symbols-outlined">
                                                        remove
                                                    </span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                onclick="showInfo({{ $item->id }}, '{{ $item->name }}')">
                                                {{ __('infos') }}
                                            </a>
                                        </td>
                                        <td>
                                            <x-jet-button class=""
                                                onclick="removeSpecificCart('{{ $item->rowId }}')">
                                                Löschen!
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($liquids as $index => $item)
                                    <tr class="my-1">
                                        <td><img src="/images/piece/{{ $item->options->image }}" class="table-img">
                                        </td>
                                        <td><span class="text-dark">{{ $item->name }}</span></td>
                                        <td> <span class="font-weight-bold"> {{ $item->price }}€ / 50ml</span></td>
                                        <td class="text-center" data-title="stock">
                                            <div class="flex">
                                                <span class="qty ml-2 mr-2"
                                                    id='qty{{ $item->id }}'>{{ $item->qty }}</span>
                                                <button onclick="window.location='{{ route('showLiquids') }}'">
                                                    <span class="material-symbols-outlined">
                                                        edit
                                                    </span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                onclick="showInfo({{ $item->id }}, '{{ $item->name }}')">
                                                {{ __('infos') }}
                                            </a>
                                        </td>
                                        <td>
                                            <x-jet-button class=""
                                                onclick="removeSpecificCart('{{ $item->rowId }}')">
                                                Löschen!
                                            </x-jet-button>
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
                    <h5>Total inkl. MwSt: <b id="total">{{ Gloudemans\Shoppingcart\Facades\Cart::total() }}</b>
                    </h5>
                    <button class="custom-btn green-bg" role="button" onclick="getLiquidAndIngredientContent()">
                        Jetzt kaufen </button>
                </div>
            </div>
            <div class="w-full md:w-2/6">
                @include('layouts.mixerComponent')
                @include('layouts.progressbarComponent')
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    var bottle = {!! json_encode($bottle) !!};
    var ingredienteContent = Object.values({!! json_encode($ingredients) !!});
    var liquidContent = [];
    removeBall();
    ingredienteContent.forEach((ingrediente) => {
        console.log(ingrediente);
        setImg(
            ingrediente.options.image,
            ingrediente.qty
        );
    });

    function getLiquidAndIngredientContent() {
        getCartContent(bottle);
    }
</script>
