<x-app-layout>
    <div class="min-h-[85vh] bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-lime-400 to-lime-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl w-40em">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 w-40em">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Neue Zutat hinzufügen:</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="/create/ingrediente" enctype="multipart/form-data" method="post">
                                @csrf
                                <div>
                                    <x-jet-label for="name" value="{{ __('Name:') }}" />
                                    <input class="block mt-1 w-full" id="name" type="text" name="name"
                                        required autofocus />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="price" value="{{ __('Einzelpreis:') }}" />
                                    <input class="block mt-1 w-full" id="price" type="number" step="0.01"
                                        name="price" required autofocus />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="type" value="{{ __('Type:') }}" />
                                    <select class="block mt-1 w-full" name="type" required autofocus>
                                        <option value="fruits">fruits</option>
                                        <option value="vegetables">vegetables</option>
                                        <option value="liquid">liquid</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="image" value="{{ __('SVG der Zutat:') }}" />
                                    <input class="block mt-1 w-full" id="image" type="file" step="0.01"
                                        name="image" required autofocus />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/home">
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
