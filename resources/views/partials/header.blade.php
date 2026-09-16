<header class="bg-dark text-white py-3">

    <div class="container d-flex justify-content-between align-items-center">

        <!-- Logo -->

        <a
            href="{{ route('home') }}"
            class="text-decoration-none text-white">

            <h2 class="m-0">
                🛒 TechHub
            </h2>

        </a>


        <!-- Search -->

        <div class="w-50">

            <input
                type="text"
                class="form-control"
                placeholder="Search for products...">

        </div>


        <!-- Actions -->

        <div class="d-flex align-items-center">


            <!-- ========================= -->
            <!-- Wishlist -->
            <!-- ========================= -->

            @auth

                <a
                    href="{{ route('wishlist.index') }}"
                    class="btn btn-outline-light me-2 position-relative"
                    title="Wishlist">

                    ❤️

                    @php
                        $wishlistCount = Auth::user()
                            ->wishlists()
                            ->count();
                    @endphp

                    @if($wishlistCount > 0)

                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                            {{ $wishlistCount }}

                        </span>

                    @endif

                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="btn btn-outline-light me-2 position-relative"
                    title="Login to use Wishlist">

                    ❤️

                </a>

            @endauth


            <!-- ========================= -->
            <!-- Shopping Cart -->
            <!-- ========================= -->

            <a
                href="{{ route('cart.index') }}"
                class="btn btn-outline-light me-2 position-relative"
                title="Shopping Cart">

                🛒

                @if($cartCount > 0)

                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        {{ $cartCount }}

                    </span>

                @endif

            </a>


            <!-- ========================= -->
            <!-- Guest -->
            <!-- ========================= -->

            @guest

                <a
                    href="{{ route('login') }}"
                    class="btn btn-outline-light me-2">

                    Login

                </a>


                <a
                    href="{{ route('register') }}"
                    class="btn btn-danger">

                    Register

                </a>

            @endguest


            <!-- ========================= -->
            <!-- Authenticated User -->
            <!-- ========================= -->

            @auth

                <span class="text-white me-3">

                    👋 {{ Auth::user()->name }}

                </span>


                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="d-inline">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger">

                        Logout

                    </button>

                </form>

            @endauth


        </div>

    </div>

</header>