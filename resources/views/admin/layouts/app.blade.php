<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Dashboard') - TechHub
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>

        /* =========================================================
           TECHHUB ADMIN PANEL
           ========================================================= */

        :root {
            --admin-bg: #0b0d10;
            --admin-sidebar: #111318;
            --admin-topbar: #15181d;
            --admin-card: #171a20;
            --admin-border: #2a2e36;
            --admin-text: #f5f5f5;
            --admin-muted: #8f96a3;
            --admin-red: #e9364f;
            --admin-red-hover: #ff435d;
        }


        /* =========================================================
           BASE
           ========================================================= */

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            background: var(--admin-bg);
            color: var(--admin-text);
        }


        /* =========================================================
           MAIN WRAPPER
           ========================================================= */

        .admin-wrapper {
            min-height: 100vh;
            display: flex;
            background: var(--admin-bg);
        }


        /* =========================================================
           SIDEBAR
           ========================================================= */

        .admin-sidebar {
            width: 260px;
            min-width: 260px;
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            background: var(--admin-sidebar);
            border-right: 1px solid var(--admin-border);

            position: sticky;
            top: 0;

            transition:
                width 0.25s ease,
                min-width 0.25s ease,
                transform 0.25s ease;
        }


        /* Brand */

        .admin-sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--admin-border);
        }

        .admin-sidebar-brand a {
            display: flex;
            align-items: center;
            gap: 10px;

            color: var(--admin-text);
        }

        .admin-brand-icon {
            font-size: 24px;
        }

        .admin-brand-text {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .admin-brand-label {
            margin-top: 6px;

            color: var(--admin-red);

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }


        /* Navigation */

        .admin-sidebar-nav {
            flex: 1;
            padding: 18px 12px;
            overflow-y: auto;
        }

        .admin-nav-section {
            margin-top: 22px;
        }

        .admin-nav-section:first-child {
            margin-top: 0;
        }

        .admin-nav-heading {
            padding: 0 12px;
            margin-bottom: 7px;

            color: #737b88;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 11px 12px;
            margin: 3px 0;

            border-radius: 8px;

            color: #c8cdd5;
            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .admin-nav-link:hover {
            background: #1c2027;
            color: #fff;
            transform: translateX(2px);
        }

        .admin-nav-link.active {
            background: rgba(233, 54, 79, 0.14);
            color: #fff;

            box-shadow:
                inset 3px 0 0 var(--admin-red);
        }

        .admin-nav-icon {
            width: 22px;

            display: inline-flex;
            justify-content: center;

            font-size: 16px;
        }


        /* Sidebar Footer */

        .admin-sidebar-footer {
            padding: 16px;
            border-top: 1px solid var(--admin-border);
        }

        .admin-user-info {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 12px;
        }

        .admin-user-avatar {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 50%;

            background: var(--admin-red);
            color: #fff;

            font-size: 14px;
            font-weight: 800;
        }

        .admin-user-details {
            min-width: 0;

            display: flex;
            flex-direction: column;
        }

        .admin-user-details strong {
            color: #fff;

            font-size: 13px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-user-details span {
            margin-top: 2px;

            color: var(--admin-muted);

            font-size: 11px;
        }

        .admin-logout-btn {
            width: 100%;

            padding: 9px 12px;

            border: 1px solid #3a3e46;
            border-radius: 7px;

            background: transparent;
            color: #d4d8de;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                color 0.2s ease;
        }

        .admin-logout-btn:hover {
            background: rgba(233, 54, 79, 0.12);
            border-color: var(--admin-red);
            color: #fff;
        }


        /* =========================================================
           MAIN AREA
           ========================================================= */

        .admin-main {
            flex: 1;
            min-width: 0;
            min-height: 100vh;

            background: var(--admin-bg);
        }


        /* =========================================================
           TOPBAR
           ========================================================= */

        .admin-topbar {
            min-height: 72px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 26px;

            background: var(--admin-topbar);
            border-bottom: 1px solid var(--admin-border);
        }

        .admin-topbar-left,
        .admin-topbar-right {
            display: flex;
            align-items: center;
        }

        .admin-topbar-left {
            gap: 15px;
        }

        .admin-sidebar-toggle {
            width: 38px;
            height: 38px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--admin-border);
            border-radius: 7px;

            background: #1a1d23;
            color: #fff;

            font-size: 18px;

            cursor: pointer;
        }

        .admin-sidebar-toggle:hover {
            background: #22262e;
            border-color: #3b404a;
        }

        .admin-page-heading {
            display: flex;
            flex-direction: column;
        }

        .admin-page-title {
            color: #fff;

            font-size: 16px;
            font-weight: 700;
        }

        .admin-page-subtitle {
            margin-top: 2px;

            color: var(--admin-muted);

            font-size: 11px;
        }


        /* Topbar Right */

        .admin-topbar-right {
            gap: 18px;
        }

        .admin-topbar-store {
            display: flex;
            align-items: center;
            gap: 7px;

            color: #cdd2da;
            text-decoration: none;

            font-size: 13px;
            font-weight: 600;
        }

        .admin-topbar-store:hover {
            color: #fff;
        }

        .admin-topbar-divider {
            width: 1px;
            height: 30px;

            background: var(--admin-border);
        }

        .admin-topbar-user {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .admin-topbar-avatar {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--admin-red);
            color: #fff;

            font-size: 12px;
            font-weight: 800;
        }

        .admin-topbar-user-info {
            display: flex;
            flex-direction: column;
        }

        .admin-topbar-user-info strong {
            color: #fff;
            font-size: 12px;
        }

        .admin-topbar-user-info span {
            margin-top: 2px;

            color: var(--admin-muted);

            font-size: 10px;
        }


        /* =========================================================
           CONTENT
           ========================================================= */

        .admin-content {
            padding: 30px;
        }

        .admin-content h1 {
            margin: 0;

            color: #fff;

            font-size: 34px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .admin-content p {
            color: var(--admin-muted);
        }


        /* =========================================================
           MOBILE
           ========================================================= */

        @media (max-width: 991.98px) {

            .admin-sidebar {
                position: fixed;
                z-index: 1050;

                top: 0;
                left: 0;

                height: 100vh;

                transform: translateX(0);
            }

            .admin-sidebar.collapsed {
                transform: translateX(-100%);
            }

            .admin-main {
                width: 100%;
            }

            .admin-topbar {
                padding: 0 18px;
            }

            .admin-topbar-store span {
                display: none;
            }

            .admin-content {
                padding: 22px 18px;
            }

        }


        @media (max-width: 575.98px) {

            .admin-topbar {
                min-height: 64px;
                padding: 0 14px;
            }

            .admin-page-subtitle {
                display: none;
            }

            .admin-topbar-divider {
                display: none;
            }

            .admin-topbar-user-info {
                display: none;
            }

            .admin-content h1 {
                font-size: 28px;
            }

        }

    </style>

</head>


<body>


    <div class="admin-wrapper">


        {{-- =====================================================
             SIDEBAR
             ===================================================== --}}

        @include('admin.partials.sidebar')


        {{-- =====================================================
             MAIN AREA
             ===================================================== --}}

        <main class="admin-main">


            {{-- =================================================
                 TOPBAR
                 ================================================= --}}

            @include('admin.partials.topbar')


            {{-- =================================================
                 PAGE CONTENT
                 ================================================= --}}

            <div class="admin-content">

                @yield('content')

            </div>


        </main>


    </div>


    {{-- =========================================================
         SIDEBAR TOGGLE
         ========================================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const toggleButton =
                document.getElementById('adminSidebarToggle');

            const sidebar =
                document.querySelector('.admin-sidebar');


            if (toggleButton && sidebar) {

                toggleButton.addEventListener('click', function () {

                    sidebar.classList.toggle('collapsed');

                });

            }

        });

    </script>


</body>

</html>
