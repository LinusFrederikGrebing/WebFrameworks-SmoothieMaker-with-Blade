<x-guest-layout>
    <div class="container">
        @include('layouts.sizeComponent')
        <div class="w-full">
            <div class="flex"> 
                <button onclick="window.location='{{ route('showFruits') }}'"
                    class="flex justify-center w-1/2 custom-btn {{ request()->is('custom/fruits') ? 'grey-active-bg' : 'grey-bg' }}">
                    <img src="/images/fruitsicon.png" alt="Bild 1" class="inline-block h-6">
                    Früchte
                </button>
                <button onclick="window.location='{{ route('showVeggie') }}'"
                    class="flex items-center justify-center w-1/2 custom-btn {{ request()->is('custom/veggie') ? 'grey-active-bg' : 'grey-bg' }}">
                    <img src="/images/vegetablesicon.png" alt="Bild 2" class="inline-block h-6">
                    Gemüse
                </button>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/5">
                <div class="flex flex-wrap item-list">
                    @foreach ($ingredients as $index => $ingredient)
                        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 p-2" id="ingrediente-card{{$index}}" onmouseenter="hoverEnter(event)" onmouseleave="hoverLeave(event)">
                            <div class="v-card mx-auto ingrediente-item bg-white rounded-md overflow-hidden">
                                <div class="text-center">
                                    <div class="h-16 w-16 mx-auto mt-4">
                                        <img class="h-full w-full object-contain"
                                            src="/images/piece/{{ $ingredient->image }}" alt="{{ $ingredient->name }}">
                                    </div>
                                    <p class="font-bold text-lg my-2">{{ $ingredient->name }}</p>
                                    <p>{{ $ingredient->price }}€ / 50g</p>
                                </div>
                                @csrf
                                <div>
                                    <div class="flex justify-center mb-1">
                                        <button class="w-30px"
                                            onclick="increaseSelectedAmount({{ $index }})"><span
                                                class="material-symbols-outlined">
                                                add
                                            </span>
                                        </button>
                                        <div width="15" complete="false" id="selectedAmount_{{ $index }}">1
                                        </div>
                                        <button class="w-30px"
                                            onclick="decreaseSelectedAmount({{ $index }})"><span
                                                class="material-symbols-outlined">
                                                remove
                                            </span>
                                        </button>
                                        <button
                                            onclick="addToCartWithselectedAmounts({{ $ingredient->id }}, {{ $index }})"><i
                                                style="color: black" class="material-icons">shopping_cart</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex">
                    <button onclick="window.location='{{ route('showBottleSizes') }}'"
                        class="flex justify-center w-1/2 custom-btn red-bg custom-btn">
                        Zurück
                    </button>
                    <button onclick="window.location='{{ route('showLiquids') }}'"
                        class="flex items-center justify-center w-1/2 green-bg custom-btn">
                        Weiter
                    </button>
                </div>
            </div>
            <div class="w-full md:w-2/5">
                @include('layouts.mixerComponent')
                @include('layouts.progressbarComponent')
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
  
    var ingredients = {!! json_encode($ingredients) !!};
    var selectedAmounts = Array(ingredients.length).fill(1);
    enterIngredientGrid();
    function increaseSelectedAmount(index) {
        if (selectedAmounts[index] < 20) {
            selectedAmounts[index]++;
        }
        var element = document.getElementById('selectedAmount_' + index);
        element.innerHTML = selectedAmounts[index];
    }

    function decreaseSelectedAmount(index) {
        if (selectedAmounts[index] > 1) {
            selectedAmounts[index]--;
        }
        var element = document.getElementById('selectedAmount_' + index);
        element.innerHTML = selectedAmounts[index];
    }

    function addToCartWithselectedAmounts(ingredienteId, index) {
        addIngredienteToCart(ingredienteId, selectedAmounts[index]);
    }


    function enterIngredientGrid() {
      for (let i = 0; i < ingredients.length; i++) {
        let element = document.getElementById("ingrediente-card" + i);
        gsap.fromTo(
          element,
          {
            y: -1000,
            x: -1000,
          },
          {
            delay: Math.random() / 2,
            duration: 2,
            y: 0,
            x: 0,
          }
        );
      }
    }
</script>
