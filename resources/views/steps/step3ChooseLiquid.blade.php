<x-guest-layout>
    <div class="container">
        @include('layouts.groesse')
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
                                            type="submit">
                                            <svg class="flex-1 w-8 h-8 fill-current ml-3" viewbox="0 0 24 24">
                                                <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"/>
                                                </svg>
                
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    </div>
</x-guest-layout>
