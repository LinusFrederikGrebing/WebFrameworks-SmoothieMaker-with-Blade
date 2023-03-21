<x-app-layout>
    <div class="min-h-[85vh] w-3/4 ml-auto mr-auto">
        <div class="container p-4 mx-auto my-6 space-y-1 text-center">
            <h3 class="pb-3 text-2xl font-bold md:text-3xl">Kunden-Ansicht</h3>
            <p>Hier kannst du deine abgespeicherten Zusammenstellungen aufrufen!</p>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th scope="col" class="w-3/4">Name</th>
                    <th scope="col" class="w-1/8">Entfernen</th>
                    <th scope="col" class="w-1/8">Wählen!</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userPresets as $index => $item)
                    <tr>
                        <td>{{ $item }}</td>
                        <td>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" onclick="deletePreset('{{ $item }}')">
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
