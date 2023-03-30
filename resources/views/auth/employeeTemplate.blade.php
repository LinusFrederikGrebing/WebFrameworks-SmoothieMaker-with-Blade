<x-app-layout>
    <div class="w-3/4 ml-auto mr-auto mb-16 pt-2 mt-8">
        <div class="container p-4 mx-auto my-6 space-y-1 text-center mt-16">
            <h3 class="pb-3 text-2xl font-bold md:text-3xl">Admin-Ansicht</h3>
            <p>Hier können alle Zutaten eingesehen und verwaltet werden!</p>
        </div>
        <div>
            <div class="flex">
                <button onclick="window.location='{{ route('showFruitsEmployee') }}'"
                    class="flex justify-center w-1/2 custom-btn grey-bg">
                    <img src="/images/fruitsicon.png" alt="Bild 1" class="inline-block h-6">
                    Früchte
                </button>
                <button onclick="window.location='{{ route('showVeggieEmployee') }}'"
                    class="flex items-center justify-center w-1/2 custom-btn grey-bg">
                    <img src="/images/vegetablesicon.png" alt="Bild 2" class="inline-block h-6">
                    Gemüse
                </button>
                <button onclick="window.location='{{ route('showLiquidEmployee') }}'"
                    class="flex items-center justify-center w-1/2 custom-btn grey-bg">
                    <img src="/images/liquidicon.png" alt="Bild 2" class="inline-block h-6">
                    Flüssigkeit
                </button>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full">
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 md:w-1/4 lg:w-2/12 plus-icon-container v-card">
                        <button class="w-full" onclick="window.location='{{ route('create') }}'">
                            <span class="material-symbols-outlined plus-icon">
                                add
                            </span>
                        </button>
                    </div>
                    @foreach ($ingredients as $index => $ingredient)
                        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-2/12 p-2" id="ingredient-card{{ $index }}"
                            onmouseenter="hoverEnter(event)" onmouseleave="hoverLeave(event)">
                            <div class="v-card mx-auto ingredient-item bg-white rounded-md overflow-hidden">
                                <div class="text-center">
                                    <div class="h-16 w-16 mx-auto mt-4">
                                        <img class="h-full w-full object-contain"
                                            src="/images/piece/{{ $ingredient->image }}" alt="{{ $ingredient->name }}">
                                        <button class="info-button"
                                            onclick="showInfo({{ $ingredient->id }}, '{{ $ingredient->name }}', true)">
                                            <span class="material-symbols-outlined mt-3 mr-3"> info </span>
                                        </button>
                                    </div>
                                    <p class="font-bold text-lg my-2">{{ $ingredient->name }}</p>
                                    <p>{{ $ingredient->price }}€ / 50g</p>
                                </div>
                                @csrf
                                <div>
                                    <div class="flex w-full mt-2">
                                        <form class="w-1/2" action="/update/ingredient/{{ $ingredient['id'] }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <button class="v-card w-full">
                                                <span class="material-symbols-outlined">edit</span>
                                            </button>
                                        </form>
                                        <form class="w-1/2" action="/delete/ingredient/{{ $ingredient['id'] }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <button class="v-card w-full">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@if (session('alert'))
    <script>
        Swal.fire({
            title: "Die Zuatat wurde erfolgreich hinzugefügt!",
            text: "Klicke auf Informationen hinzufügen, um die Inhaltsstoffe der Zutat einzutragen!",
            icon: "success",
            showCancelButton: true,
            cancelButtonText: "Später hinzufügen",
            confirmButtonColor: "#6D9E1F",
            confirmButtonText: "Informationen hinzufügen",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/create-ingredient/" + {{ session('alert')['id'] }};
            }
        });
    </script>
@endif
