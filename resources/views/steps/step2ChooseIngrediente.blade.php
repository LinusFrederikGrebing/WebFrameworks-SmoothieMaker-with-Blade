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
                                            src="/images/piece/{{ $ingredient->image }}" alt="{{ $ingredient->name }}">
                                    </div>
                                    <p class="font-bold text-lg my-2">{{ $ingredient->name }}</p>
                                    <p>{{ $ingredient->price }}€ / 50g</p>
                                </div>
                                <form enctype="multipart/form-data" method="post">
                                    <div class="flex justify-center items-center mb-4">
                                        <button
                                            class="w-8 h-8 text-lg bg-thm-red text-white font-bold rounded-full focus:outline-none"
                                            @click.prevent="decreaseSelectedAmount({{ $loop->index }})">
                                            <svg class="w-4 h-4 fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 13H13v6c0 .6-.4 1-1 1s-1-.4-1-1v-6H5c-.6 0-1-.4-1-1s.4-1 1-1h6V5c0-.6.4-1 1-1s1 .4 1 1v6h6c.6 0 1 .4 1 1s-.4 1-1 1z"/></svg>

                                              
                                        </button>
                                        <div class="w-12 mx-2 text-center">1</div>
                                        <button
                                            class="w-8 h-8 text-lg bg-thm-red text-white font-bold rounded-full focus:outline-none"
                                            @click.prevent="decreaseSelectedAmount({{ $loop->index }})">
                                            <svg class="w-4 h-4 text-gray-900" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M15 9a1 1 0 010 2H5a1 1 0 110-2h10z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button
                                            class="w-12 h-8 ml-2 bg-thm-blue text-white rounded-md hover:bg-thm-blue-hover focus:outline-none"
                                            type="submit"
                                            @click.prevent="addToCart('{{ $ingredient->name }}', {{ $ingredient->price }},1 }})">
                                            <svg class="w-8 h-8 fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 7h-4.44l-.76-2.3A1 1 0 0 0 14.91 4H9.09a1 1 0 0 0-.89.7L7.44 7H3a1 1 0 0 0 0 2h.44l2.24 9.78A2 2 0 0 0 7.58 20h8.84a2 2 0 0 0 1.9-1.44L20.56 9H21a1 1 0 0 0 0-2zm-9 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm-4-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex">
                    <button onclick="window.location='{{ route('showBottleSizes') }}'"
                        class="flex justify-center w-1/2 custom-btn red-bg custom-btn">
                        Zurück
                    </button>
                    <button onclick="window.location='{{ route('showCard') }}'"
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
    <script>
        handleFormSubmit();
        handleArrowClick();
        handleBackClick();

        function handleFormSubmit() {
            $('.btn.wkorb').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var url = form.prop('action');
                var data = form.serialize();

                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    success: function(response) {
                        if (response.image) {
                            setImg(response.image, response.reqCount);
                            setNewCounter(response.count);
                            progress(response.count, response.amount);
                        } else {
                            showAlertTooMany();
                        }
                    }
                });
            });
        }

        function handleArrowClick() {
            $('.arrcontainer').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('.arrow').toggleClass('bounceAlpha');
            });
        }

        function handleBackClick() {
            $(".back").click(function(e) {
                e.preventDefault();
                var self = $(this);
                removeAllAlert(self);
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

        function setNewCounter(newCounter) {
            $(".cart-count").html(newCounter);
        }
    </script>
</x-guest-layout>
