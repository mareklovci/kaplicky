<div id="sidebar" class="sidenav">
    <a href="javascript:void(0)" class="arrow arrow-left" onclick="closeNav()"></a>
    <li class="nav-item"> &#160;</li>
    <li class="nav-item"> &#160;</li>
    <li class="nav-item"> &#160;</li>
    <li class="nav-item"> &#160;</li>
    @guest
        <li class="nav-item">
            <a class="dropdown-item text-headline" href="{{ url('/') }}">{{ __('Home') }}</a>
            <a class="dropdown-item text-headline" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="dropdown-item text-headline" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a class="dropdown-item text-headline" href="{{ url('/') }}">home</a>

            <a class="dropdown-item text-headline" href="{{ url('/categories') }}">topics</a>

            <a class="dropdown-item text-headline" href="{{ url('/artefact') }}">books</a>

            <a class="dropdown-item text-headline" href="{{ url('/favartefacts') }}">my books</a>

            <a class="dropdown-item text-headline" href="{{ url('/favmetadata') }}">my notes</a>

            <a class="dropdown-item text-headline" href="{{ url('/charts') }}">charts</a>

        </li>
        <li class="nav-item dropdown separator">
            <a class="dropdown-item text-headline" href="{{ url('/czech') }}">česky</a>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-item text-headline" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endguest

</div>

<nav class="navbar navbar-expand-md navbar-light black shadow-sm top-bar">
    <span class="arrow arrow-right" onclick="openNav()"></span>
    @if(!Request::is('login')&&!Request::is('register'))
        <a for="logo" class="logo-kaplicky kaplicky" href="{{ url('/') }}">{{ __('kaplicky') }}</a>
    @endif
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
