<nav class="navbar navbar-expand-lg navbar-dark bg-black">

    <div class="container">

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#mainMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
            class="collapse navbar-collapse"
            id="mainMenu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>