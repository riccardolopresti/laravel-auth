<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm h-100 px-5">

    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <div class="logo_laravel">
            <img src="https://img.logoipsum.com/212.svg" alt="logo">
        </div>
            {{-- config('app.name', 'Laravel') --}}
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  drop-custom" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/') }}"><i class="fa-solid fa-globe"></i> Vai al sito</a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
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

                <div class="search-box">
                    <form action="{{route('admin.projects.index')}}" method="GET" class="mx-5 d-flex align-items-center">
                        @csrf
                        <input class="rounded-pill search-custom" type="text" name="search" placeholder=" Cerca...">
                        <button class="btn p-2" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>


                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <i class="fa-solid fa-right-from-bracket"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
