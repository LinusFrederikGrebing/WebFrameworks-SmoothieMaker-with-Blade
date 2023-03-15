<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SmoothieMaker') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet"
     href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

    @livewireStyles
</head>

<body>
    <nav class="bg-thm-grey h-14">
        <div class="container mx-auto flex items-center justify-between py-4">
            <!-- SmoothieMaker logo -->
            <a class="text-white text-lg" href="{{ url('/') }}">
                SmoothieMaker
            </a>
            
            <!-- Navigation items -->
            <div class="flex items-center">
              <!-- Authentication Links -->
              <ul class="flex items-center">
                @guest
                  @if (Route::has('login'))
                    <li class="ml-4">
                      <a class="text-white hover:text-gray-300" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                  @endif
            
                  @if (Route::has('register'))
                    <li class="ml-4">
                      <a class="text-white hover:text-gray-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                  @endif
                @else
                  <!-- User dropdown -->
                  <li class="ml-4 relative">
                    <button id="dropdown-btn" class="flex items-center text-white hover:text-gray-300 focus:outline-none">
                      <span class="mr-1">{{ Auth::user()->name }}</span>
                    </button>
                  
                    <!-- Dropdown items -->
                    <div class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg hidden">
                      <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-gray-900" href="/home">
                        Home
                      </a>
                      <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-gray-900" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                      </form>
                    </div>
                  </li>
                @endguest
              </ul>
            </div>
          </div>
    </nav>
    @include('sweetalert::alert')
    <div class="font-sans text-gray-900 antialiased m-auto w-3/4 bg-white-500">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
<script src="{{ asset('js/gsap.js') }}"></script>
<script src="{{ asset('js/api.js') }}"></script>
<script src="{{ asset('js/sweetalerts.js') }}"></script>
@include('layouts.footer')
</html>
