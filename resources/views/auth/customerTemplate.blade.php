<x-app-layout>
    <div class="min-h-[85vh] lg:w-3/4 ml-auto mr-auto mt-16 pt-4">
        <div class="container p-2 mx-auto my-2 space-y-1 text-center">
            <h3 class="pb-3 text-2xl font-bold md:text-3xl mt-4">Kunden-Ansicht</h3>
            <p>Hier kannst du deine abgespeicherten Zusammenstellungen aufrufen!</p>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th scope="col" class="w-10/12">Name</th>
                    <th scope="col" class="w-1/12">Entfernen</th>
                    <th scope="col" class="w-1/12">Wählen!</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userPresets as $index => $item)
                    <tr>
                        <td>{{ $item }}</td>
                        <td>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                onclick="deletePreset('{{ $item }}')">
                                {{ __('löschen') }}
                            </a>
                        </td>
                        <td>
                            <x-jet-button class="" onclick="choosePreset('{{ $item }}')">
                                {{ __('Wählen!') }}
                            </x-jet-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
