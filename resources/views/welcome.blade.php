<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    
</head>

<body class="antialiased">
    <x-guest-layout>
        <!-- component -->
        <div class="container v-card">
            <div class="py-8 main-container m-auto px-6">
                <div class="lg:flex justify-between items-center">
                    <div id="left-text" class="lg:w-6/12">
                        <h1 class="text-4xl font-bold leading-tight mb-5 capitalize px-4 mt-16 p-16"> Smoothiemaker </h1>
                        <p class="text-xl px-4 py-4"> Stelle Dir jetzt deinen perfekten Smoothie zusammen! Deine Auswahl
                            erstreckt
                            sich aus einer Vielzahl verschiedener Zutaten. Es gibt vier veschiedene Smoothie-Größen. Du
                            kannst entscheiden, ob dein Smoothie aus 250ml, 500ml, 750ml oder sogar 1l leckeren Zutaten
                            bestehen soll. Den Smoothie kannst du kostenlos und ohne Anmeldung zusammenstellen. Bei Kauf
                            errechnet sich der Preis deines Getränks aus den Einzelpreisen der Zutaten. </p>
                        <div class="px-4 py-4">
                            <button class="custom-btn green-bg"
                                onclick="window.location='{{ route('showBottleSizes') }}'">
                                Beginne mit der Zusammenstellung

                            </button>
                        </div>
                    </div>
                    <div class="lg:w-7/12 order-2">
                        <img class="v-card" id="right-img" src="/images/smoothie.jpg"
                            style="transform: scale(1) perspective(1040px) rotateY(-11deg) rotateX(2deg) rotate(2deg);"
                            alt="" class="rounded">
                    </div>
                </div>
            </div>
            
            <div id="steps" class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 py-20 mb-32 mt-32">
                <div id="stepsheader" class="container p-4 mx-auto my-6 space-y-1 text-center">
                    <h4 class="pb-3 text-2xl font-bold md:text-3xl">Nur drei Schritte bis zu deinem Smoothie!</h4>
                    <p>An warmen Tagen sind erfrischende Drinks wichtiger, denn je! Und Smoothies sind als Erfrischung (und auch als Frühstück) dafür einfach perfekt. Sie sind gesund, voller Vitamine und machen fit für den Tag. Ich kriege von Smoothies diesen Sommer auf jeden Fall nicht genug. Deswegen schnapp‘ dir auch einen und lass uns auf dem Balkon, Terrasse oder in meinem Fall im Park chillen.</p>
                </div>
                <div class="grid gap-8 row-gap-0 lg:grid-cols-3">
                    <div id="step1" class="relative text-center">
                        <div
                            class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-indigo-50 sm:w-20 sm:h-20">
                            <svg class="w-12 h-12 text-deep-purple-accent-400 sm:w-16 sm:h-16" stroke="currentColor"
                                viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                                    points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                        </div>
                        <h6 class="mb-2 text-2xl font-extrabold">Schritt 1</h6>
                        <p class="max-w-md mb-3 text-sm text-gray-900 sm:mx-auto">
                            Wähle deine Smoothiegröße aus! Du hast die Wahl zwischen 250ml, 500ml, 750ml und 1000ml.
                        </p>
                        <div class="top-0 right-0 flex items-center justify-center h-24 lg:-mr-8 lg:absolute">
                            <svg class="w-8 text-gray-700 transform rotate-90 lg:rotate-0" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <line fill="none" stroke-miterlimit="10" x1="2" y1="12" x2="22"
                                    y2="12"></line>
                                <polyline fill="none" stroke-miterlimit="10" points="15,5 22,12 15,19 "></polyline>
                            </svg>
                        </div>
                    </div>
                    <div id="step2" class="relative text-center">
                        <div
                            class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-indigo-50 sm:w-20 sm:h-20">
                            <svg class="w-12 h-12 text-deep-purple-accent-400 sm:w-16 sm:h-16" stroke="currentColor"
                                viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                                    points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                        </div>
                        <h6 class="mb-2 text-2xl font-extrabold">Schritt 2</h6>
                        <p class="max-w-md mb-3 text-sm text-gray-900 sm:mx-auto">
                            Bei Schritt 2 hast Du die Auswahl aus vielen verschiedenen Früchten.
                        </p>
                        <div class="top-0 right-0 flex items-center justify-center h-24 lg:-mr-8 lg:absolute">
                            <svg class="w-8 text-gray-700 transform rotate-90 lg:rotate-0" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <line fill="none" stroke-miterlimit="10" x1="2" y1="12" x2="22"
                                    y2="12"></line>
                                <polyline fill="none" stroke-miterlimit="10" points="15,5 22,12 15,19 "></polyline>
                            </svg>
                        </div>
                    </div>
                    <div id="step3" class="relative text-center">
                        <div
                            class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-indigo-50 sm:w-20 sm:h-20">
                            <svg class="w-12 h-12 text-deep-purple-accent-400 sm:w-16 sm:h-16" stroke="currentColor"
                                viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                                    points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                        </div>
                        <h6 class="mb-2 text-2xl font-extrabold">Schritt 3</h6>
                        <p class="max-w-md mb-3 text-sm text-gray-900 sm:mx-auto">
                            Überprüfe deine Bestellung! Nach deiner Bestellung liefern wir Dir deine
                            Smoothie-Zusammenstellung innerhalb von einer Stunde!
                        </p>
                    </div>
                </div>
            </div>
            <div id="tipsheader" class="container p-4 mx-auto my-6 space-y-1 text-center">
                <h2 class="pb-3 text-2xl font-bold md:text-3xl">Unsere Smoothie-Tipps der Woche</h2>
                <p>Hier findest du unsere Smoothie-Geheimtipps. Lasse dich gerne von unseren Top-Vorschlägen inspirieren!</p>
            </div>
            <section id="tips" class="p-4 lg:p-8">
                <div class="container mx-auto space-y-12">
                    <hr>
                    <div id="tip1" class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                        <img style="transform: scale(1) perspective(1040px) rotateY(11deg) rotateX(-2deg) rotate(-2deg);" src="/images/beerensmoothie.jpg" alt=""
                            class="h-80 aspect-video">
                        <div class="flex flex-col justify-center flex-1 p-6 v-card">
                            <h4 class="text-2xl font-bold">Beeren-Smoothie mit Flohsamenschalen & Kokoswasser</h4>
                            <p class="my-6">Dieser beerige Smoothie liefert viele wertvolle Ballaststoffe, wichtige Antioxidantien und Eisen. Er schmeckt fruchtig frisch und erhält eine leichte Schärfe durch den enthaltenen Ingwer. Der natürliche, fettfreie Iso-Drink aus der Kokosnuss - das Kokoswasser - rundet den Smoothie perfekt ab.</p>
                        </div>
                    </div>
                    <hr>
                    <div id="tip2" class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row-reverse">
                        <img style="transform: scale(1) perspective(1040px) rotateY(-11deg) rotateX(-2deg) rotate(-2deg);" src="/images/rucolasmoothie.jpg" alt=""
                            class="h-80 aspect-video">
                        <div class="flex flex-col justify-center flex-1 p-6 v-card">
                            <h4 class="text-2xl font-bold">Grüner Smoothie mit Rucola</h4>
                            <p class="my-6 gray-400"> Dieses Exemplar ist perfekt für alle, die sich gerade erst an dieses Metier herantrauen, denn Mango und Zitrone bieten noch viel Fruchtigkeit. Mit einem leistungsstarken Mixer werden die Fasern des Rucolas optimal aufgespalten und du erhältst einen samtigen Smoothie, der fast so fein wie Saft ist.</p>
                        </div>
                    </div>
                    <hr>
                    <div id="tip3" class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                        <img  style="transform: scale(1) perspective(1040px) rotateY(11deg) rotateX(-2deg) rotate(-2deg);" src="/images/schokosmoothie.jpg" alt=""
                            class="h-80 aspect-video">
                        <div class="flex flex-col justify-center flex-1 p-6 v-card">
                            <h4 class="text-2xl font-bold">Avocado-Schoko-Smoothie</h4>
                            <p class="my-6-gray-400">Schokolade zum Frühstück – mit diesem Smoothie ist das problemlos möglich. Dank Bananen, Avocado und Backkakao wird es nicht nur lecker, sondern auch gesund.</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </section>
        </div>
    </x-guest-layout>
    <script src="{{ asset('js/gsap.js') }}"></script>
</body>

</html>
