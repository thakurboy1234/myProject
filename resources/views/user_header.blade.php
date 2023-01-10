<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNav">
        @auth
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user_profile') }}">
                        {{ auth()->user()->First_name }} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create_blog') }}">NewPost</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post') }}">MyPosts</a>
                </li>
            </ul>
        @endauth
        {{-- <form class="form-inline my-2 my-lg-0" style="position: fixed;left: 60%;">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}

        <ul class="nav navbar-nav cart" style="position: fixed;left: 85%;">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-shopping-cart"></i><span id="countCart"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
