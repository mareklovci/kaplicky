<div id="sidebar" class="sidenav">
    <a href="javascript:void(0)" class="arrow arrow-left" onclick="closeNav()"></a>
    <ul style="padding-left: 0; margin-top: 5rem;">
    @guest
        <li class="nav-item">
            <a class="menu-item text-headline" href="{{ url('/') }}">
                {{ __('general.home') }}
            </a>
            <a class="menu-item text-headline" href="{{ route('login') }}">
                {{ __('general.login') }}
            </a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="menu-item text-headline" href="{{ route('register') }}">
                    {{ __('general.register') }}
                </a>
            </li>
        @endif
    @else
        <li class="nav-item">
            <a class="menu-item text-headline" href="{{ url('/') }}">
                {{ __('general.home') }}
            </a>

            <a class="menu-item text-headline" href="{{ url('/categories') }}">
                {{ __('general.topics') }}
            </a>

            <a class="menu-item text-headline" href="{{ url('/artefact') }}">
                {{ __('general.artefacts') }}
            </a>

            <a class="menu-item text-headline" href="{{ url('/favartefacts') }}">
                {{ __('general.favourite_artefacts') }}
            </a>

            <a class="menu-item text-headline" href="{{ url('/favmetadata') }}">
                {{ __('general.favourite_metadata') }}
            </a>

            <a class="menu-item text-headline" href="{{ url('/charts') }}">
                {{ __('general.charts') }}
            </a>

        </li>
        <li class="nav-item down">
            <a class="menu-item text-headline" href="{{ url('/czech') }}">
                {{ __('general.cs') }}
            </a>
            <a class="menu-item text-headline" href="{{ route('logout') }}" onclick="
            event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('general.logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endguest
    </ul>
</div>

<nav class="navbar navbar-expand-md navbar-light top-bar">
    <span class="arrow arrow-right" onclick="openNav()"></span>
    @if(!Request::is('login')&&!Request::is('register'))
        <a for="logo" class="logo-kaplicky kaplicky" href="{{ url('/') }}">
            {{ __('general.kaplicky') }}
        </a>
    @endif
    <div class="bar-desktop">
        @guest
                <a class="menu-item text-headline-desktop" href="{{ url('/') }}">
                    {{ __('general.home') }}
                </a>
                <a class="menu-item text-headline-desktop" href="{{ route('login') }}">
                    {{ __('general.login') }}
                </a>
            @if (Route::has('register'))
                    <a class="menu-item text-headline-desktop" href="{{ route('register') }}">
                        {{ __('general.register') }}
                    </a>
            @endif
        @else
        <a class="menu-item text-headline-desktop" href="{{ url('/') }}">
            {{ __('general.home') }}
        </a>

        <a class="menu-item text-headline-desktop" href="{{ url('/categories') }}">
            {{ __('general.topics') }}
        </a>

        <a class="menu-item text-headline-desktop" href="{{ url('/artefact') }}">
            {{ __('general.artefacts') }}
        </a>

        <a class="menu-item text-headline-desktop" href="{{ url('/favartefacts') }}">
            {{ __('general.favourite_artefacts') }}
        </a>

        <a class="menu-item text-headline-desktop" href="{{ url('/favmetadata') }}">
            {{ __('general.favourite_metadata') }}
        </a>

        <a class="menu-item text-headline-desktop" href="{{ url('/charts') }}">
            {{ __('general.charts') }}
        </a>

        <a class="menu-item text-headline-desktop" href="{{ url('/czech') }}">
            {{ __('general.cs') }}
        </a>
        <a class="menu-item text-headline-desktop" href="{{ route('logout') }}" onclick="
            event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('general.logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>
</nav>
{{--<label for="logo" class="col-md-12 kaplicky" style="display: inline-block; text-align: center; padding: 1.25rem; padding-bottom: 0">{{ __('kaplicky') }}</label>
{{--<label for="logo" class="col-md-4 kaplicky">{{ __('kaplicky') }}</label>--}}
{{--<a class="navbar-brand kaplicky" href="{{ url('/') }}">
    {{  __('kaplicky') }}
</a>--}}

<script>
    function openNav() {
        var x = window.matchMedia("(max-width: 540px)")
        if (x.matches) {
            document.getElementById("sidebar").style.width = "50vw";
        } else {
            document.getElementById("sidebar").style.width = "250px";
        }
    }

    function closeNav() {
        document.getElementById("sidebar").style.width = "0";
    }
</script>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    $(function () {
        $('a').each(function () {
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active');// $(this).parents('a').addClass('active');
            }
        });
    });
</script>
