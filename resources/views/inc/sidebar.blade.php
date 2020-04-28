<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="arrow-left" style="cursor:pointer" onclick="closeNav()"></a>
    <li class="nav-item"></li>
    <li class="nav-item"></li>
    <li class="nav-item"></li>
    <li class="nav-item"></li>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
           {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                <a class="dropdown-item text-headline" href="{{ url('/favartefacts') }}">Favorite artefacts</a>

                <a class="dropdown-item text-headline" href="{{ url('/favmetadata') }}">Favorite metadata</a>

                <a class="dropdown-item text-headline" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            {{-- </div>--}}
        </li>
        @endguest

</div>

<span class="arrow-right" style="cursor:pointer" onclick="openNav()"></span>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "50vh";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
