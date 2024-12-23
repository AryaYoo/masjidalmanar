<nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src={{ Vite::asset('resources/images/logo.png') }} alt="" width="98" height="62">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item px-3">
                    @if(Auth::check() && Auth::user()->hasRole ('admin'))
                    <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Dashboard Infaq</a>
                    @else
                    <a class="nav-link" aria-current="page" href="{{ url('/homeuser') }}">Infaqku</a>
                    @endif
                </li>
                <li class="nav-item px-3">
                    @if(Auth::check() && Auth::user()->hasRole ('admin'))
                    <a class="nav-link" target="" href="{{ url('/kajians') }}">Kajian</a>
                    @else
                    <a class="nav-link" aria-current="page" href="{{ url('user/kajians') }}">Kajian</a>
                    @endif
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Kegiatan</a>
                </li>
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Profil  </a>
                    <ul class=" dropdown-menu m-4" aria-labelledby="navbarDropdown">
                        <div class="container">
                        <li>
                            <div class="card mb-3 mt-1" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Sejarah</h5>
                                    <p class="card-text">Pembangunan yang berkesinambungan mengharuskan adanya suatu perencanaan jangka panjang. Diharapkan dengan adanya perencanaan ini, arah pembangunan yang diinginkan dapat dicapai secara bertahap.</p>
                                    <a href="#" class="btn text-white" style="background-color: rgb(26, 24, 156)" >Pelajari Selengkapnya</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card mb-1" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Struktur Organisasi</h5>
                                    <p class="card-text"></p>
                                    <a target="_blank" href="https://drive.google.com/file/d/1mlKAQmGScW1LiuNoznt4NKvKXQBRfe-a/view?usp=sharing" class="btn text-white" style="background-color: rgb(26, 24, 156)" >Lihat lebih detail</a>
                                </div>
                            </div>
                        </li>
                        </div>

                    </ul>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn m-2 px-4 text-white" style="background-color:rgb(26, 24, 156)" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn m-2 px-4 text-white" style="background-color: rgb(26, 24, 156)" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
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
        </div>
    </div>
</nav>


