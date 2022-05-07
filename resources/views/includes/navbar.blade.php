    <nav class=" navbar navbar-expand-lg  fixed-top navbar-light bg-white navbar-book " data-aos="fade-down">
        <a class="navbar-brand" href="/">Me. <span>Fabulous</span></a>
        <button class="navbar-toggler btn-pink" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories')}}">book MUA</a>
                </li>
            <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
            </li>
           
        </ul>
        @guest
        <ul class="navbar-nav nav-button ">
            <li class="nav-item">
            <a class="nav-link mr-3" href="{{route('register')}}">Sign Up</a>
            </li>
            <li class="nav-item">
            <a class="btn btn-pink" href="{{route('login')}}">Sign In <i class="fas fa-sign-in-alt"></i></a>
            </li>
        </ul>
        @endguest

        @auth
            <ul class="navbar-nav nav-button ">

                <li class="nav-item">
                    <a href="#" class="nav-link" ">
                    <img src="/images/icons8-smiling-mouth-50.png" class="rounded-circle mr-1 profile-picture" alt="">
                    Hi,{{Auth::user()->name}}
                    </a>
                </li>

                @if  (Auth::user() && Auth::user()->roles == 'ADMIN')
                <li class="nav-item mt-3">
                    <a class="btn btn-pink" href="/admin">Dashboard </a>
                    </li>
                    @elseif (Auth::user() && Auth::user()->roles == 'MUA')
                    <li class="nav-item mt-3">
                        <a class="btn btn-pink" href="/mua-admin">Dashboard </a>
                        </li>
                @endif

                    <li class="nav-item">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-pink mt-3 ml-2">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    </li>
                </ul>
            </ul>
        @endauth
        </div>
    </nav>