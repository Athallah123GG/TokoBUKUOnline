
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">GRAMEDIYAORI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('features') }}">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pricing') }}">Pricing</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('unauthenticate') }}">Logout</a>
                </li>
                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>

                @endauth



                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">Hai {{ auth()->user()->name }}</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
