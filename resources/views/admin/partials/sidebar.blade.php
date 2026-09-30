<aside class="admin-sidebar">

    <!-- Brand -->

    <div class="admin-sidebar-brand">

        <a
            href="{{ route('admin.dashboard') }}"
            class="text-decoration-none">

            <span class="admin-brand-icon">
                🛒
            </span>

            <span class="admin-brand-text">
                TechHub
            </span>

        </a>

        <div class="admin-brand-label">
            ADMIN PANEL
        </div>

    </div>


    <!-- Navigation -->

    <nav class="admin-sidebar-nav">

        <!-- Dashboard -->

        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <span class="admin-nav-icon">
                📊
            </span>

            <span>
                Dashboard
            </span>

        </a>


        <!-- Catalog -->

        <div class="admin-nav-section">

            <div class="admin-nav-heading">
                CATALOG
            </div>


            <!-- Products -->

            <a
                href="{{ route('admin.products.index') }}"
                class="admin-nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

                <span class="admin-nav-icon">
                    📦
                </span>

                <span>
                    Products
                </span>

            </a>


            <!-- Categories -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    🗂️
                </span>

                <span>
                    Categories
                </span>

            </div>


            <!-- Flash Sale -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    ⚡
                </span>

                <span>
                    Flash Sale
                </span>

            </div>

        </div>


        <!-- Sales -->

        <div class="admin-nav-section">

            <div class="admin-nav-heading">
                SALES
            </div>


            <!-- Orders -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    🛍️
                </span>

                <span>
                    Orders
                </span>

            </div>


            <!-- Customers -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    👥
                </span>

                <span>
                    Customers
                </span>

            </div>

        </div>


        <!-- Engagement -->

        <div class="admin-nav-section">

            <div class="admin-nav-heading">
                ENGAGEMENT
            </div>


            <!-- Wishlists -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    ❤️
                </span>

                <span>
                    Wishlists
                </span>

            </div>


            <!-- Reviews -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    ⭐
                </span>

                <span>
                    Reviews
                </span>

            </div>


            <!-- Coupons -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    🎟️
                </span>

                <span>
                    Coupons
                </span>

            </div>

        </div>


        <!-- System -->

        <div class="admin-nav-section">

            <div class="admin-nav-heading">
                SYSTEM
            </div>


            <!-- Reports -->

            <div
                class="admin-nav-link disabled"
                aria-disabled="true">

                <span class="admin-nav-icon">
                    📈
                </span>

                <span>
                    Reports
                </span>

            </div>


            <!-- View Store -->

            <a
                href="{{ route('home') }}"
                class="admin-nav-link">

                <span class="admin-nav-icon">
                    🌐
                </span>

                <span>
                    View Store
                </span>

            </a>

        </div>

    </nav>


    <!-- Admin User -->

    <div class="admin-sidebar-footer">

        <div class="admin-user-info">

            <div class="admin-user-avatar">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>

            <div class="admin-user-details">

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </div>


        <!-- Logout -->

        <form
            action="{{ route('logout') }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="admin-logout-btn">

                Logout

            </button>

        </form>

    </div>

</aside>