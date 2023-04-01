<x-guest-layout>
    <div class="min-h-[85vh] bg-gray-100 mt-16">
        <div class="relative sm:mx-auto ">
            <div
                class="absolute inset-0 bg-gradient-to-r from-lime-400 to-lime-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl mx-auto md:w-3/5 lg:w-2/5 top-16">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 mt-16 md:w-3/5 lg:w-2/5 top-16 mx-auto">
                <div>
                    <div>
                        <h1 class="text-2xl font-semibold">Registrierung</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div>
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="email" value="{{ __('E-Mail') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Passwort') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="new-password" />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="password_confirmation" value="{{ __('Passwort wiederholen') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('login') }}">
                                        {{ __('Bereits registriert?') }}
                                    </a>
                                    <x-jet-button class="ml-4">
                                        {{ __('Registrieren') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
