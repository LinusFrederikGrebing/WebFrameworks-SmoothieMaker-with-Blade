<x-guest-layout>
    <div class="v-card">
        <div class="py-16 main-container m-auto px-32">
            <div class="lg:flex justify-between items-center">
                <div id="left-text" class="lg:w-5/12 mr-16">
                    <h1 class="text-4xl font-bold leading-tight mb-5 capitalize px-4 mt-16 pt-16"> Smoothiemaker </h1>
                    <p class="px-4 py-4"> Stelle Dir jetzt deinen perfekten Smoothie zusammen! Deine Auswahl
                        erstreckt
                        sich aus einer Vielzahl verschiedener Zutaten. Es gibt vier veschiedene Smoothie-Größen. Du
                        kannst entscheiden, ob dein Smoothie aus 250ml, 500ml, 750ml oder sogar 1l leckeren Zutaten
                        bestehen soll. Den Smoothie kannst du kostenlos und ohne Anmeldung zusammenstellen. Bei Kauf
                        errechnet sich der Preis deines Getränks aus den Einzelpreisen der Zutaten. </p>
                    <div class="px-4 py-4">
                        <button class="custom-btn green-bg" onclick="window.location='{{ route('showBottleSizes') }}'">
                            Beginne mit der Zusammenstellung

                        </button>
                    </div>
                </div>
                <div class="lg:w-7/12 order-2 mt-16 ml-16">
                    <img class="v-card mt-16" id="right-img" src="/images/smoothie.jpg"
                        style="transform: scale(1) perspective(1040px) rotateY(-11deg) rotateX(2deg) rotate(2deg);"
                        alt="" class="rounded">
                </div>
            </div>
        </div>
        @include('landingpage.stepsComponent')
        @include('landingpage.smoothieTipsComponent')
    </div>
</x-guest-layout>

