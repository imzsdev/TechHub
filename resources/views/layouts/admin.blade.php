<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Admin Panel') - TechHub
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            margin: 0;
            background: #111111;
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
        }

        .admin-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* ================================
           SIDEBAR
        ================================= */

        .admin-sidebar {
            width: 250px;
            min-height: 100vh;
            background: #171717;
            border-right: 1px solid #333333;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1030;
            overflow-y: auto;
        }

        .admin-brand {
            height: 72px;
            display: flex;
            align-items: center;
            padding: 0 24px;
            border-bottom: 1px solid #333333;
        }

        .admin-brand a {
            text-decoration: none;
            color: #ffffff;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .admin-brand span {
            color: #dc3545;
        }

        .admin-sidebar-nav {
            padding: 20px 14px;
        }

        .admin-nav-title {
            color: #777777;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 10px;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 11px 12px;
            margin-bottom: 5px;
            border-radius: 8px;
            color: #aaaaaa;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .admin-nav-link i {
            width: 20px;
            font-size: 17px;
        }

        .admin-nav-link:hover {
            color: #ffffff;
            background: #242424;
        }

        .admin-nav-link.active {
            color: #ffffff;
            background: #dc3545;
        }

        .admin-nav-link.disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        /* ================================
           MAIN AREA
        ================================= */

        .admin-main {
            width: calc(100% - 250px);
            margin-left: 250px;
            min-height: 100vh;
        }

        /* ================================
           TOPBAR
        ================================= */

        .admin-topbar {
            height: 72px;
            background: #171717;
            border-bottom: 1px solid #333333;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .admin-topbar-title {
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dc3545;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
        }

        .admin-user-info {
            line-height: 1.2;
        }

        .admin-user-name {
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
        }

        .admin-user-role {
            color: #777777;
            font-size: 11px;
            text-transform: uppercase;
        }

        /* ================================
           CONTENT
        ================================= */

        .admin-content {
            min-height: calc(100vh - 72px);
            background: #111111;
        }

        /* ================================
           MOBILE
        ================================= */

        @media (max-width: 991.98px) {

            .admin-sidebar {
                width: 220px;
            }

            .admin-main {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

        }

        @media (max-width: 767.98px) {

            .admin-sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid #333333;
            }

            .admin-wrapper {
                display: block;
            }

            .admin-main {
                width: 100%;
                margin-left: 0;
            }

            .admin-topbar {
                position: relative;
                padding: 0 18px;
            }

            .admin-content {
                min-height: auto;
            }

        }

    </style>

</head>


<body>

<div class="admin-wrapper">


    <!-- ========================================= -->
    <!-- ADMIN SIDEBAR -->
    <!-- ========================================= -->

    <aside class="admin-sidebar">


        <!-- Brand -->

        <div class="admin-brand">

            <a href="{{ route('admin.dashboard') }}">

                Tech<span>Hub</span>

            </a>

        </div>


        <!-- Navigation -->

        <nav class="admin-sidebar-nav">


            <div class="admin-nav-title">
                Main
            </div>


            <!-- Dashboard -->

            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-nav-link
                {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Products -->

            <a
                href="{{ route('admin.products.index') }}"
                class="admin-nav-link
                {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

                <i class="bi bi-box-seam-fill"></i>

                <span>
                    Products
                </span>

            </a>


            <div class="admin-nav-title mt-4">
                Management
            </div>


            <!-- Orders -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-cart-check-fill"></i>

                <span>
                    Orders
                </span>

            </div>


            <!-- Customers -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-people-fill"></i>

                <span>
                    Customers
                </span>

            </div>


            <!-- Reviews -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-star-fill"></i>

                <span>
                    Reviews
                </span>

            </div>


            <!-- Inventory -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-boxes"></i>

                <span>
                    Inventory
                </span>

            </div>


            <div class="admin-nav-title mt-4">
                Marketing
            </div>


            <!-- Coupons -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-ticket-perforated-fill"></i>

                <span>
                    Coupons
                </span>

            </div>


            <!-- Flash Sale -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-lightning-charge-fill"></i>

                <span>
                    Flash Sale
                </span>

            </div>


            <div class="admin-nav-title mt-4">
                System
            </div>


            <!-- Settings -->

            <div class="admin-nav-link disabled">

                <i class="bi bi-gear-fill"></i>

                <span>
                    Settings
                </span>

            </div>


        </nav>


    </aside>


    <!-- ========================================= -->
    <!-- MAIN -->
    <!-- ========================================= -->

    <div class="admin-main">


        <!-- ========================================= -->
        <!-- TOPBAR -->
        <!-- ========================================= -->

        <header class="admin-topbar">


            <div class="admin-topbar-title">

                @yield('title', 'Admin Panel')

            </div>


            <div class="admin-user">


                <div class="admin-user-info text-end">

                    <div class="admin-user-name">

                        {{ auth()->user()->name }}

                    </div>

                    <div class="admin-user-role">

                        {{ auth()->user()->role }}

                    </div>

                </div>


                <div class="admin-user-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


            </div>


        </header>


        <!-- ========================================= -->
        <!-- PAGE CONTENT -->
        <!-- ========================================= -->

        <main class="admin-content">

            @yield('content')

        </main>


    </div>


</div>


</body>

</html>