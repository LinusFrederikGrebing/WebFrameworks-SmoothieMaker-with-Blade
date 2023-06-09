<x-app-layout>
    <div class="min-h-[85vh] bg-gray-100 mt-16">
        <div class="relative sm:mx-auto ">
            <div
                class="absolute inset-0 bg-gradient-to-r from-lime-400 to-lime-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl mx-auto md:w-3/5 lg:w-2/5 top-16">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 mt-16 md:w-3/5 lg:w-2/5 top-16 mx-auto">
                <div>
                    <div>
                        <h1 class="text-2xl font-semibold">Zutat {{ $ingredient['name'] }} aktualisieren:</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="/updated/ingredient/{{ $ingredient['id'] }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div>
                                    <x-jet-label for="name" value="{{ __('Neuer Name:') }}" />
                                    <input class="block mt-1 w-full" id="name"
                                        value="{{ old('name') ?? $ingredient['name'] }}" type="text" name="name"
                                        required autofocus />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="price" value="{{ __('Neuer Einzelpreis:') }}" />
                                    <input class="block mt-1 w-full" id="price" type="number"
                                        value="{{ old('price') ?? $ingredient['price'] }}" step="0.01"
                                        name="price" required autofocus />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="type" value="{{ __('Neuer Type:') }}" />
                                    <select class="block mt-1 w-full" name="type"
                                        value="{{ old('type') ?? $ingredient['type'] }}" required autofocus>
                                        <option value="fruits">fruits</option>
                                        <option value="vegetables">vegetables</option>
                                        <option value="liquid">liquid</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="image" value="{{ __('Neues SVG der Zutat:') }}" />
                                    <input type="file" class="form-control-file" id="image" name="image"
                                        value="{{ old('image') ?? $ingredient->image }}">
                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/employee">
                                            {{ __('Zurück') }}
                                        </a>
                                        <x-jet-button class="ml-4">
                                            Zutat aktualisieren
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
