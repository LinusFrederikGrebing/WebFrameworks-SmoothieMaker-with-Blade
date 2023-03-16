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
<script>
    var dropdownBtn = document.getElementById('dropdown-btn');
    var dropdownMenu = dropdownBtn.nextElementSibling;

    dropdownBtn.addEventListener('click', function() {
    dropdownMenu.classList.toggle('hidden');
    });
</script>