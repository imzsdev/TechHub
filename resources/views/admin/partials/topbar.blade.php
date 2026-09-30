<header class="admin-topbar">

    <!-- Left Side -->

    <div class="admin-topbar-left">

        <button
            type="button"
            class="admin-sidebar-toggle"
            id="adminSidebarToggle"
            aria-label="Toggle sidebar">

            ☰

        </button>


        <div class="admin-page-heading">

            <span class="admin-page-title">
                @yield('admin_page_title', 'Dashboard')
            </span>

            <span class="admin-page-subtitle">
                TechHub Administration
            </span>

        </div>

    </div>


    <!-- Right Side -->

    <div class="admin-topbar-right">

        <!-- Store -->

        <a
            href="{{ route('home') }}"
            class="admin-topbar-store"
            title="View Store">

            🌐

            <span>
                View Store
            </span>

        </a>


        <!-- Divider -->

        <div class="admin-topbar-divider"></div>


        <!-- Admin User -->

        <div class="admin-topbar-user">

            <div class="admin-topbar-avatar">

                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            </div>


            <div class="admin-topbar-user-info">

                <strong>
                    {{ Auth::user()->name }}
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </div>

    </div>

</header>