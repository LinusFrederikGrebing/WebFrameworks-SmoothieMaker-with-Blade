<x-guest-layout>
    <div class="container">
        @include('layouts.groesse')
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/5">
                <div class="flex flex-wrap item-list">
                    @foreach ($ingredients as $index => $ingredient)
                        <div class="col-sm-12 col-md-12 col-xl-6 col-lg-12 col-xs-12 my-2 mx-2 card-color"
                            id="liquid_{{ $ingredient->id }}" onclick="setLiquidBasedOnId({{ $ingredient->id }})">
                            <div>
                                <img class="white--text align-end ml-auto mr-auto mt-1 mb-1" height="60px" width="60px"
                                    src="/images/piece/{{ $ingredient->image }}">
                                <div class="d-flex justify-center">
                                    <hr />
                                    <p class="font-weight-bold ml-1 mr-1">{{ $ingredient->name }}:</p>
                                    <hr />
                                    <p>{{ $ingredient->price }}€ / 50g</p>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <button class="ml-4 mr-4 flex-grow-1 green-bg custom-btn">
                                        Wählen!
                                    </button>
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
                    <button onclick="showStep3afterLiquid()"
                        class="flex items-center justify-center w-1/2 green-bg custom-btn">
                        Weiter
                    </button>
                </div>
            </div>
            <div class="w-full md:w-2/5">
                <livewire:mixer />
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
