<x-app-layout>
    <div class="min-h-[85vh] bg-gray-100 mt-16">
        <div class="relative sm:mx-auto ">
            <div
                class="absolute inset-0 bg-gradient-to-r from-lime-400 to-lime-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl mx-auto md:w-3/5 lg:w-2/5 top-16">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 mt-16 md:w-3/5 lg:w-2/5 top-16 mx-auto">
                <div>
                    <div>
                        <h1 class="text-2xl font-semibold">Informationen zur Zutat {{ $ingredient['name'] }}
                            aktualisieren:</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="/update/ingredientInfo/{{ $ingredient['id'] }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="flex">
                                    <div class="grow">
                                        <x-jet-label for="info" value="{{ __('Info:') }}" />
                                        <input class="block mt-1 w-full" id="info" type="text" name="info"
                                            value="{{ old('info') ?? $ingredientInfo['info'] }}" required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="energie" value="{{ __('Energie:') }}" />
                                        <input class="block mt-1 w-full" id="energie" type="text" name="energie"
                                            value="{{ old('energie') ?? $ingredientInfo['energie'] }}" required
                                            autofocus />
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <div class="grow">
                                        <x-jet-label for="fett" value="{{ __('Fett:') }}" />
                                        <input class="block mt-1 w-full" id="fett" type="text" name="fett"
                                            value="{{ old('fett') ?? $ingredientInfo['fett'] }}" required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="fattyacids" value="{{ __('Fettsäure:') }}" />
                                        <input class="block mt-1 w-full" id="fattyacids" type="text"
                                            name="fattyacids"
                                            value="{{ old('fattyacids') ?? $ingredientInfo['fattyacids'] }}" required
                                            autofocus />
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <div class="grow">
                                        <x-jet-label for="carbohydrates" value="{{ __('Kohlenhydrate:') }}" />
                                        <input class="block mt-1 w-full" id="carbohydrates" type="text"
                                            name="carbohydrates"
                                            value="{{ old('carbohydrates') ?? $ingredientInfo['carbohydrates'] }}"
                                            required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="fruitscarbohydrates"
                                            value="{{ __('davon Fruchtzucker:') }}" />
                                        <input class="block mt-1 w-full" id="fruitscarbohydrates" type="text"
                                            name="fruitscarbohydrates"
                                            value="{{ old('fruitscarbohydrates') ?? $ingredientInfo['fruitscarbohydrates'] }}"
                                            required autofocus />
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <div class="grow">
                                        <x-jet-label for="protein" value="{{ __('Protein:') }}" />
                                        <input class="block mt-1 w-full" id="protein" type="text" name="protein"
                                            value="{{ old('protein') ?? $ingredientInfo['protein'] }}" required
                                            autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="salt" value="{{ __('Salz:') }}" />
                                        <input class="block mt-1 w-full" id="salt" type="text" name="salt"
                                            value="{{ old('salt') ?? $ingredientInfo['salt'] }}" required autofocus />
                                    </div>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/employee">
                                        {{ __('Zurück') }}
                                    </a>
                                    <x-jet-button class="ml-4">
                                        {{ __('Zutat aktualisieren') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
