<x-guest-layout>
    <div class="v-card">
        <div class="container m-auto">
            <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row-reverse lg:py-16">
                <img src="/images/smoothie.jpg"
                    style="transform: scale(1) perspective(1040px) rotateY(-11deg) rotateX(2deg) rotate(2deg);"
                    alt="" class="lg:w-1/2 lg:h-1/2 lg:mt-16 lg:pt-16 mt-8 pt-8">
                <div class="flex flex-col justify-center flex-1 lg:mx-16 my-4 p-8">
                    <h1 class="text-4xl font-bold leading-tight mb-5 capitalize px-4 mt-16 pt-16"> Smoothiemaker </h1>
                    <p class="px-4 py-4"> Stelle Dir jetzt deinen perfekten Smoothie zusammen! Deine Auswahl
                        erstreckt sich aus einer Vielzahl verschiedener Zutaten. Es gibt
                        vier veschiedene Smoothie-Größen. Du kannst entscheiden, ob dein
                        Smoothie aus 500ml, 750ml, 1000ml oder sogar 1250ml leckeren Zutaten
                        bestehen soll. Den Smoothie kannst du kostenlos und ohne Anmeldung
                        zusammenstellen. Registriert kannst du deine eigenen
                        Smoothie-Zusammenstellungen erstellen und zwischenspeichern. Bei
                        Kauf errechnet sich der Preis Deines Getränks aus den Einzelpreisen
                        der Zutaten.
                    </p>
                    <div class="px-4 py-4">
                        <button class="custom-btn green-bg" onclick="window.location='{{ route('showBottleSizes') }}'">
                            Beginne mit der Zusammenstellung
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('landingpage.stepsComponent')
        @include('landingpage.smoothieTipsComponent')
    </div>
</x-guest-layout>
