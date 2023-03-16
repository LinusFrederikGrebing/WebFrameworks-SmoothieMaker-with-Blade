<x-guest-layout>
    <div class="container">
        <div class="text-center pt-12">
            <h1 class="font-bold text-xl md:text-2xl lg:text-3xl font-heading text-black">
                Wähle jetzt abschließend deine Flüssigkeit!
            </h1>
        </div>
        @include('layouts.groesse')
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/5">
                <div class="flex flex-wrap item-liquid-list">
                    @foreach ($ingredients as $index => $ingredient)
                    <div  class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 p-2" id="ingrediente-card{{$index}}" onmouseenter="hoverEnter(event)" onmouseleave="hoverLeave(event)">
                        <div id="liquid_{{ $ingredient->id }}" class="v-card mx-auto ingrediente-item bg-white rounded-md overflow-hidden">
                            <div class="text-center">
                                <div class="h-16 w-16 mx-auto mt-4">
                                    <img class="h-full w-full object-contain"
                                        src="/images/piece/{{ $ingredient->image }}" alt="{{ $ingredient->name }}">
                                </div>
                                <p class="font-bold text-lg my-2">{{ $ingredient->name }}</p>
                                <p>{{ $ingredient->price }}€ / 50g</p>
                            </div>
                            @csrf
                            <div class="d-flex align-items-center mb-2">
                                <button class="ml-4 mr-4 flex-grow-1 green-bg custom-btn" onclick="setLiquidBasedOnId({{ $ingredient->id }})">
                                    Wählen!
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex">
                    <button onclick="window.location='{{ route('showFruits') }}'"
                        class="flex justify-center w-1/2 custom-btn red-bg custom-btn">
                        Zurück
                    </button>
                    <button onclick="showStep3afterLiquid()"
                        class="flex items-center justify-center w-1/2 green-bg custom-btn">
                        Weiter
                    </button>
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
    var liquidList = {!! json_encode($ingredients) !!};

    function setLiquidBasedOnId(liquidId) {
        for (let i = 0; i < liquidList.length; i++) {
            if (liquidList[i].id === liquidId) {
                selectCard(liquidList[i]);
            }
        }
    }
</script>
