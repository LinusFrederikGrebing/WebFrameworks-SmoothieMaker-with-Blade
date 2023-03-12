<x-guest-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <div class="container">
        @include('layouts.groesse')
        <div class="w-full">
            <div class="flex">
                <button onclick="window.location='{{ route('showFruits') }}'"
                    class="flex justify-center w-1/2 custom-btn grey-bg">
                    <img src="/images/fruitsicon.png" alt="Bild 1" class="inline-block h-6">
                    Früchte
                </button>
                <button onclick="window.location='{{ route('showVeggie') }}'"
                    class="flex items-center justify-center w-1/2 custom-btn grey-bg">
                    <img src="/images/vegetablesicon.png" alt="Bild 2" class="inline-block h-6">
                    Gemüse
                </button>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/5">
                <div class="flex flex-wrap item-list">
                    @foreach ($ingredients as $ingredient)
                    <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 p-2">
                        <div class="v-card mx-auto ingrediente-item bg-white rounded-md overflow-hidden">
                            <div class="text-center">
                                <div class="h-16 w-16 mx-auto mt-4">
                                    <img class="h-full w-full object-contain"
                                         src="/images/piece/{{ $ingredient->image }}"
                                         alt="{{ $ingredient->name }}">
                                </div>
                                <p class="font-bold text-lg my-2">{{ $ingredient->name }}</p>
                                <p>{{ $ingredient->price }}€ / 50g</p>
                            </div>
                            @csrf

                            <button class="custom-btn grey-bg add-to-cart-btn"
                                    onclick="addToCart({{ $ingredient->id }}, 1)">
                                add to Cart
                            </button>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="flex">
                    <button onclick="window.location='{{ route('showBottleSizes') }}'"
                        class="flex justify-center w-1/2 custom-btn red-bg custom-btn">
                        Zurück
                    </button>
                    <button onclick="window.location='{{ route('showLiquids') }}'"
                        class="flex items-center justify-center w-1/2 green-bg custom-btn">
                        Weiter
                    </button>
                </div>
            </div>
            <div class="w-full md:w-2/5">
                <livewire:mixer />
                @include('layouts.progressbar')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/gsap.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        var cartCount = 0;
        var bottle = [];
        var liquidCount = 0;
        getProgress();
        setNewSizeCounter();
        function getProgress() {
            axios.get('/cart/count')
                .then(response => {
                    cartCount = response.data.cartCount;
                    bottle = response.data.bottle;
                    liquidCount = response.data.liquidCount;
                    setNewProgress();
                    setNewSizeCounter();
                })
        }

        function setNewProgress() {
            const progressbar = document.getElementById("progressbar");
            if (bottle.amount > 0) {
                const width = cartCount * 100 / bottle.amount;
                progressbar.style.width = `${width}%`;
            } else {
                progressbar.style.width = '0%';
            }
        };

        function addToCart(ingredientId, amount) {
            axios.post(`/addCart/${ingredientId}`, { amount }).then((response) => {
                if (response.data.stored) {
                 setImg(response.data.image, amount);
                 getProgress();
                } else {
                    showAlertTooMany();
                }
            }); 
        }
     
        function removeAllAlert(self) {
            Swal.fire({
                title: 'Bist du Dir sicher?',
                text: "Wenn du zurückgehst wird deine bisherige Zusammenstellung unwiederruflich gelöscht!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6D9E1F',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Weiter zurück!',
                cancelButtonText: 'Abbrechen!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = self.data('href');
                }
            });
        }
        function showAlertTooMany() {
            Swal.fire({
                title: 'Du hast zu viele Zutaten ausgewählt!',
                text: "",
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#6D9E1F',
                confirmButtonText: 'Okay!',
            });
        }
        function setNewSizeCounter() {
            $(".cart-count").html(cartCount);
            $(".liquid-count").html(liquidCount);
            $(".bottle-name").html(bottle.name);
            $(".bottle-amount").html(bottle.amount);
        }
    </script>
</x-guest-layout>
