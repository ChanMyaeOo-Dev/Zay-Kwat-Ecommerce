<nav class="navbar navbar-expand-lg bg-white py-2 col-md-10">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">

            <a class="navbar-brand ms-2" href="{{ route('shop.index') }}">
                <img src="{{ asset('src_images/logo_expend.png') }}" alt="logo" class="app_logo_expend">
            </a>

            <ul class="navbar-nav me-auto ps-3 border-start">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">About us</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <form class="d-flex mb-0" role="search">
                    <input class="search_input form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="d-flex align-items-center">
                <ul class="navbar-nav px-2 mx-3 border-start border-end">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ms-2">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item px-3 dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end border p-2" aria-labelledby="navbarDropdown">

                                <a class="btn btn-light w-100 mb-2" href="{{ route('users.index') }}">
                                    Profile
                                </a>

                                <a class="btn btn-light w-100" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <a href="{{ route('carts.index') }}" class="btn btn-light position-relative">
                    <i class="bi bi-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        {{ count($carts) }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>

            </div>

        </div>
    </div>
</nav>
