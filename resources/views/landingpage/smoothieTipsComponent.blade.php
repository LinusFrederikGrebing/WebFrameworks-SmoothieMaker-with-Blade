<div id="tipsheader" class="container p-4 mx-auto my-6 space-y-1 text-center">
    <h2 class="pb-3 text-2xl font-bold md:text-3xl">Unsere Smoothie-Tipps der Woche</h2>
    <p>Hier findest du unsere Smoothie-Geheimtipps. Lasse dich gerne von unseren Top-Vorschlägen inspirieren!</p>
</div>
<section id="tips" class="p-4 w-3/4 mx-auto">
    <div class="container mx-auto space-y-12">
        <hr>
        <div id="tip1" class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
            <img src="/images/beerensmoothie.jpg" alt="" class="lg:h-1/3 lg:w-1/3 my-4">
            <div class="flex flex-col justify-center flex-1 lg:mx-16 my-4 lg:p-8 v-card">
                <h4 class="text-2xl font-bold">Beeren-Smoothie mit Flohsamenschalen & Kokoswasser</h4>
                <p class="my-6">Dieser beerige Smoothie liefert viele wertvolle Ballaststoffe, wichtige Antioxidantien
                    und Eisen. Er schmeckt fruchtig frisch und erhält eine leichte Schärfe durch den enthaltenen Ingwer.
                    Der natürliche, fettfreie Iso-Drink aus der Kokosnuss - das Kokoswasser - rundet den Smoothie
                    perfekt ab.</p>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        onclick="storeExistingPreset('Beeren-Smoothie mit Flohsamenschalen & Kokoswasser')">
                        {{ __('Speichern?') }}
                    </a>
                    <x-jet-button class="ml-4"
                        onclick="choosePreset('Beeren-Smoothie mit Flohsamenschalen & Kokoswasser')">
                        {{ __('Wählen!') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
        <hr>
        <div id="tip2" class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row-reverse">
            <img src="/images/rucolasmoothie.jpg" alt="" class="lg:h-1/3 lg:w-1/3 my-4">
            <div class="flex flex-col justify-center flex-1 lg:mx-16 my-4 lg:p-8 v-card">
                <h4 class="text-2xl font-bold">Grüner Smoothie mit Rucola</h4>
                <p class="my-6 gray-400"> Dieses Exemplar ist perfekt für alle, die sich gerade erst an dieses Metier
                    herantrauen, denn Mango und Zitrone bieten noch viel Fruchtigkeit. Mit einem leistungsstarken Mixer
                    werden die Fasern des Rucolas optimal aufgespalten und du erhältst einen samtigen Smoothie, der fast
                    so fein wie Saft ist.</p>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        onclick="storeExistingPreset('Grüner Smoothie mit Rucola')">
                        {{ __('Speichern?') }}
                    </a>
                    <x-jet-button class="ml-4" onclick="choosePreset('Grüner Smoothie mit Rucola')">
                        {{ __('Wählen!') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
        <hr>
        <div id="tip3" class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
            <img src="/images/schokosmoothie.jpg" alt="" class="lg:h-1/3 lg:w-1/3 my-4">
            <div class="flex flex-col justify-center flex-1 lg:mx-16 my-4 lg:p-8 v-card">
                <h4 class="text-2xl font-bold">Avocado-Schoko-Smoothie</h4>
                <p class="my-6-gray-400">Schokolade zum Frühstück – mit diesem Smoothie ist das problemlos möglich. Dank
                    Bananen, Avocado und Backkakao wird es nicht nur lecker, sondern auch gesund.</p>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        onclick="storeExistingPreset('Avocado-Schoko-Smoothie')">
                        {{ __('Speichern?') }}
                    </a>
                    <x-jet-button class="ml-4" onclick="choosePreset('Avocado-Schoko-Smoothie')">
                        {{ __('Wählen!') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
