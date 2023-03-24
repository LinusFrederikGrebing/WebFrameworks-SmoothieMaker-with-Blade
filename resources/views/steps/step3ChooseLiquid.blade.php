<x-guest-layout>
    <div class="container mt-16">
        @include('layouts.sizeComponent')
        <div class="w-full">
            <div class="flex">
                <button class="flex justify-center w-full custom-btn grey-active-bg">
                    <img src="/images/liquidicon.png" alt="Bild 1" class="inline-block h-6">
                    Flüssigkeit
                </button>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/5 mt-2">
                <div class="flex flex-wrap item-liquid-list">
                    @foreach ($ingredients as $index => $ingredient)
                        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/3 p-2" id="ingrediente-card{{ $index }}"
                            onmouseenter="hoverEnter(event)" onmouseleave="hoverLeave(event)">
                            <div id="liquid_{{ $ingredient->id }}"
                                class="v-card mx-auto ingrediente-item bg-white rounded-md overflow-hidden">
                                <div class="text-center">
                                    <div class="h-16 w-16 mx-auto mt-4">
                                        <img class="h-full w-full object-contain"
                                            src="/images/piece/{{ $ingredient->image }}" alt="{{ $ingredient->name }}">
                                        <button class="info-button"
                                            onclick="showInfo({{ $ingredient->id }}, '{{ $ingredient->name }}')">
                                            <span class="material-symbols-outlined mt-3 mr-3"> info </span>
                                        </button>
                                    </div>
                                    <p class="font-bold text-lg my-2">{{ $ingredient->name }}</p>
                                    <p>{{ $ingredient->price }}€ / 50g</p>
                                </div>
                                @csrf
                                <div class="flex justify-center mb-2">
                                    <x-jet-button class="" onclick="setLiquidBasedOnId({{ $ingredient->id }})">
                                        {{ __('Wählen!') }}
                                    </x-jet-button>
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
                @include('layouts.mixerComponent')
                @include('layouts.progressbarComponent')
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
