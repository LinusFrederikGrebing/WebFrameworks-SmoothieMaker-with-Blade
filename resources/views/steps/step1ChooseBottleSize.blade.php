<x-guest-layout>
    <div class="w-full bg-white-800 mt-16">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
            <div class="text-center pb-12">
                <h1 class="font-bold text-xl md:text-2xl lg:text-3xl font-heading text-black">
                    Wähle jetzt deine Smoothie-Größe!
                </h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach ($bottles as $index => $bottle)
                    <div id="bottle-card{{ $index }}" class="bg-container">
                        <div class="mx-4 mb-2 v-card w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col md:flex-row rounded-box"
                            onmouseenter="hoverEnter(event)" onmouseleave="hoverLeave(event)">
                            <div class="w-full md:w-2/5 h-70">
                                <img class="object-center object-cover w-full h-full"
                                    src="/images/{{ $bottle['image'] }}" alt="bottleSize">
                            </div>
                            <div class="w-full md:w-3/5 text-left p-6 md:p-4 space-y-2">
                                <p class="text-xl text-black font-bold">Größe: {{ $bottle['name'] }}</p>
                                <p class="text-base text-gray-400 font-normal"></p>
                                <p class="text-base leading-relaxed text-gray-500 font-normal">
                                    {{ $bottle['description'] }}
                                </p>
                                <div>
                                    <button class="custom-btn green-bg newBottleSize"
                                        onclick="window.location='{{ route('showInhalt', ['bottle' => $bottle]) }}'">
                                        Weiter

                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="green-background-rotate mx-auto rounded-box"></div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-guest-layout>
<script>
    enterGrid();
    sessionStorage.clear();
</script>
