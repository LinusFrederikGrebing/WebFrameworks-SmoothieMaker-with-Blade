<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class=" mt-5">
                        <div>
                            <div>
                                <ol
                                    class="grid grid-cols-1 divide-x divide-gray-100 overflow-hidden rounded-lg border border-gray-100 text-sm text-gray-500 sm:grid-cols-3 w-100">
                                    <button onclick="window.location='{{ route('home') }}'">
                                        <li class="flex items-center justify-center p-4 bg-gray-600">
                                            <img src="/images/fruitsicon.png" alt=""
                                                class="mr-2 h-7 w-7 flex-shrink-0">
                                            <p class="leading-none">
                                                <strong class="block text-white font-bold"> Früchte </strong>
                                            </p>

                                        </li>
                                    </button>
                                    <button onclick="window.location='{{ route('dashboardVeggie') }}'">
                                        <li class="relative flex items-center justify-center bg-gray-500 p-4">
                                            <span
                                                class="absolute -left-2 top-1/2 hidden h-4 w-4 -translate-y-1/2 rotate-45 border border-b-0 border-l-0 border-gray-100 bg-gray-600 bg-white sm:block">
                                            </span>

                                            <span
                                                class="absolute -right-2 top-1/2 hidden h-4 w-4 -translate-y-1/2 rotate-45 border border-b-0 border-l-0 border-gray-100 bg-gray-500 sm:block">
                                            </span>

                                            <img src="/images/vegetablesicon.png" alt=""
                                                class="mr-2 h-7 w-7 flex-shrink-0">
                                            <p class="leading-none">
                                                <strong class="block text-white font-bold"> Gemüse </strong>
                                            </p>
                                        </li>
                                    </button>
                                    <button onclick="window.location='{{ route('dashboardLiquid') }}'">
                                        <li class="flex items-center justify-center p-4 bg-gray-600">
                                            <img src="/images/liquidicon.png" alt=""
                                                class="mr-2 h-7 w-7 flex-shrink-0">
                                            <p class="leading-none">
                                                <strong class="block text-white font-bold"> Flüssigkeit </strong>
                                            </p>
                                        </li>
                                    </button>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-10">
                        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4 mx-auto">
                            <button onclick="window.location='{{ route('create') }}'" class="buttonGreen">
                                <div
                                    class="relative overflow-hidden transition duration-300 transform rounded lg:hover:-translate-y-2">
                                    <svg class="mr-16" xmlns="http://www.w3.org/2000/svg" width="160" height="160"
                                        fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>

                                </div>
                            </button>
                            @foreach ($ingredients as $ingrediente)
                                <div>

                                    <div
                                        class="relative overflow-hidden transition duration-300 transform rounded lg:hover:-translate-y-2 px-2">
                                        <img class="object-cover h-12 md:h-20 xl:h-28"
                                            src="/images/piece/{{ $ingrediente['image'] }}" />
                                    </div>
                                    <div class="mx-auto my-2">
                                        <div>
                                            <span class="text-dark">Zutat: {{ $ingrediente['name'] }}</span>
                                            <div>
                                                <span class="font-weight-bold"> Preis: {{ $ingrediente['price'] }}€</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <form class="box" action="/api/update/ingrediente/{{ $ingrediente['id'] }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <button> <svg class="mr-16" xmlns="http://www.w3.org/2000/svg"
                                                    width="25" height="25" fill="currentColor" class="bi bi-plus"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg></button>
                                        </form>
                                        <form action="/api/delete/ingrediente/{{ $ingrediente['id'] }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <button class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="25" height="25" fill="currentColor"
                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
