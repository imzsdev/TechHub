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

                <div class="dropdown me-2">

                    <button
                        class="btn btn-outline-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        👋 {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">

                        <li>
                            <span class="dropdown-item-text text-secondary">
                                {{ Auth::user()->email }}
                            </span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a
                                href="{{ route('account') }}"
                                class="dropdown-item">

                                👤 My Account

                            </a>
                        </li>

                        <li>
                           <a
                                href="{{ route('wishlist.index') }}"
                                class="dropdown-item">

                                ❤️ Wishlist

                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form
                                action="{{ route('logout') }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    🚪 Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @endauth


        </div>

    </div>

</header>