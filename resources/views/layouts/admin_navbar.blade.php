<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('book.index') }}">Book </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route ('publisher.index') }}">Publisher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">User</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Data Table
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('book.datatable') }}">Book</a>
                        <a class="dropdown-item" href="#">Publisher</a>
                        <a class="dropdown-item" href="#">Category</a>
                    </div>

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('unauthenticate') }}">Logout</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">Hai {{ auth()->user()->name }}</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
