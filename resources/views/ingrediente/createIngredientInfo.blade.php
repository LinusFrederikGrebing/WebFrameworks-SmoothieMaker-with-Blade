<x-app-layout>
    <div class="min-h-[85vh] bg-gray-100 py-6 flex flex-col justify-center sm:py-12 mt-16">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-lime-400 to-lime-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl w-40em">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 w-40em">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Informationen zur Zutat {{ $ingrediente['name'] }} hinzufügen:
                        </h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="/create/ingredienteInfo/{{ $ingrediente['id'] }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="flex">
                                    <div class="grow">
                                        <x-jet-label for="info" value="{{ __('Info:') }}" />
                                        <input class="block mt-1 w-full" id="info" type="text" name="info"
                                            required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="energie" value="{{ __('Energie:') }}" />
                                        <input class="block mt-1 w-full" id="energie" type="text" name="energie"
                                            required autofocus />
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <div class="grow">
                                        <x-jet-label for="fett" value="{{ __('Fett:') }}" />
                                        <input class="block mt-1 w-full" id="fett" type="text" name="fett"
                                            required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="fattyacids" value="{{ __('Fettsäure:') }}" />
                                        <input class="block mt-1 w-full" id="fattyacids" type="text"
                                            name="fattyacids" required autofocus />
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <div class="grow">
                                        <x-jet-label for="carbohydrates" value="{{ __('Kohlenhydrate:') }}" />
                                        <input class="block mt-1 w-full" id="carbohydrates" type="text"
                                            name="carbohydrates" required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="fruitscarbohydrates"
                                            value="{{ __('davon Fruchtzucker:') }}" />
                                        <input class="block mt-1 w-full" id="fruitscarbohydrates" type="text"
                                            name="fruitscarbohydrates" required autofocus />
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <div class="grow">
                                        <x-jet-label for="protein" value="{{ __('Protein:') }}" />
                                        <input class="block mt-1 w-full" id="protein" type="text" name="protein"
                                            required autofocus />
                                    </div>
                                    <div class="grow mx-2">
                                        <x-jet-label for="salt" value="{{ __('Salz:') }}" />
                                        <input class="block mt-1 w-full" id="salt" type="text" name="salt"
                                            required autofocus />
                                    </div>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/employee">
                                        {{ __('Zurück') }}
                                    </a>
                                    <x-jet-button class="ml-4">
                                        {{ __('Zutat hinzufügen') }}
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
