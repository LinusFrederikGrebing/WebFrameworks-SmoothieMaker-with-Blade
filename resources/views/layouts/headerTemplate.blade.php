<nav>
    <div class="app-bar-content bg-thm-grey h-16">
        <div class="text-white mt-1 ml-16" style="text-decoration: none">
            <a href="{{ route('/') }}">
                <h4>SmoothieMaker</h4>
            </a>
        </div>
        @guest
            <div class="flex mr-16">
                <div class="ml-4">
                    <a href="{{ route('login') }}" class="text-white" style="text-decoration: none">
                        <h6>Login</h6>
                    </a>
                </div>
                <div class="ml-4">
                    <a href="{{ route('register') }}" class="text-white" style="text-decoration: none">
                        <h6>Register</h6>
                    </a>
                </div>
            </div>
        @endguest
        @auth
            <button class="flex mr-16" onclick="toggleDrawer()">
                <span class="material-symbols-outlined" style="color: white;">
                    menu
                </span>
                <div class="text-white">Menu</div>
            </button>
        @endauth
    </div>
    @auth
        <div class="active" id="navigation">
            <div class="py-8" id="sidebar">
                <div class="sidebar-body">
                    <div class="sidebar-links">
                        <small class="my-8 text-white">Benuter: {{ Auth::user()->name }}</small>
                        <br>
                        <small class="my-8 text-white">Rolle: {{ Auth::user()->type }}</small>
                        <hr class="divider" />
                        <div class="links">
                            @if(Auth::user()->type === 'mitarbeiter')
                            <div>
                                <a class="sidebar-green" href="{{ route('employeeView') }}">
                                    <div class="icon">
                                        <span class="material-symbols-outlined">
                                            playlist_add_check
                                        </span>
                                    </div>
                                    <div class="link-title" v-show="menuCompact.hidden">
                                        Admin-Ansicht
                                    </div>
                                </a>
                            </div>
                            @endif
                            <div>
                                <a class="sidebar-green" href="{{ route('/') }}">
                                    <div class="icon">
                                        <span class="material-symbols-outlined">
                                            home
                                        </span>
                                    </div>
                                    <div class="link-title" v-show="menuCompact.hidden">
                                        Startseite
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="sidebar-green" href="{{ route('customerView') }}">
                                    <div class="icon">
                                        <span class="material-symbols-outlined">
                                            info
                                        </span>
                                    </div>
                                    <div class="link-title" v-show="menuCompact.hidden">
                                        Kunden-Ansicht
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="sidebar-red" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="icon">
                                        <span class="material-symbols-outlined">
                                            logout
                                        </span>
                                    </div>
                                    <div class="link-title" v-show="menuCompact.hidden">
                                        Logout
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</nav>
<script>
    function toggleDrawer() {
        var sidebar = document.getElementById("navigation");
        console.log(sidebar);
        sidebar.classList.toggle("active");
    }
</script>
