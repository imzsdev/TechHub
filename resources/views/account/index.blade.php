@extends('layouts.app')

@section('content')

<section class="account-page-section">

```
<div class="container">

    {{-- Page Header --}}
    <div class="account-page-header">

        <span class="account-badge">
            👤 My Account
        </span>

        <h1>
            Account Information
        </h1>

        <p>
            Manage your TechHub account information and access your shopping activity.
        </p>

    </div>


    {{-- Account Layout --}}
    <div class="account-layout">


        {{-- Profile Card --}}
        <div class="account-card profile-card">

            <div class="account-card-header">

                <div class="account-icon">
                    👤
                </div>

                <div>
                    <h2>
                        Profile Information
                    </h2>

                    <p>
                        Your personal account details
                    </p>
                </div>

            </div>


            <div class="account-info-list">

                {{-- Name --}}
                <div class="account-info-item">

                    <span class="account-info-label">
                        Full Name
                    </span>

                    <strong>
                        {{ $user->name }}
                    </strong>

                </div>


                {{-- Email --}}
                <div class="account-info-item">

                    <span class="account-info-label">
                        Email Address
                    </span>

                    <strong>
                        {{ $user->email }}
                    </strong>

                </div>


                {{-- Phone --}}
                <div class="account-info-item">

                    <span class="account-info-label">
                        Phone Number
                    </span>

                    <strong>
                        {{ $user->phone ?? 'Not added yet' }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- Account Actions --}}
        <div class="account-card actions-card">

            <div class="account-card-header">

                <div class="account-icon">
                    ⚡
                </div>

                <div>
                    <h2>
                        Quick Access
                    </h2>

                    <p>
                        Quickly access your TechHub activities
                    </p>
                </div>

            </div>


            <div class="account-actions">


                {{-- Wishlist --}}
                <a
                    href="{{ route('wishlist.index') }}"
                    class="account-action">

                    <span class="action-icon">
                        ❤️
                    </span>

                    <span class="action-content">

                        <strong>
                            My Wishlist
                        </strong>

                        <small>
                            View your saved products
                        </small>

                    </span>

                    <span class="action-arrow">
                        →
                    </span>

                </a>


                {{-- Cart --}}
                <a
                    href="{{ route('cart.index') }}"
                    class="account-action">

                    <span class="action-icon">
                        🛒
                    </span>

                    <span class="action-content">

                        <strong>
                            Shopping Cart
                        </strong>

                        <small>
                            View items in your cart
                        </small>

                    </span>

                    <span class="action-arrow">
                        →
                    </span>

                </a>


                {{-- Products --}}
                <a
                    href="{{ route('products') }}"
                    class="account-action">

                    <span class="action-icon">
                        🛍️
                    </span>

                    <span class="action-content">

                        <strong>
                            Continue Shopping
                        </strong>

                        <small>
                            Browse TechHub products
                        </small>

                    </span>

                    <span class="action-arrow">
                        →
                    </span>

                </a>

            </div>

        </div>


        {{-- ========================================= --}}
        {{-- ORDER HISTORY --}}
        {{-- ========================================= --}}

        <div class="account-card order-history-card">

            <div class="account-card-header">

                <div class="account-icon">
                    📦
                </div>

                <div>

                    <h2>
                        Order History
                    </h2>

                    <p>
                        View your recent TechHub orders
                    </p>

                </div>

            </div>


            @if($orders->count() > 0)

                <div class="order-history-list">

                    @foreach($orders as $order)

                        <div class="order-history-item">

                            <div class="order-history-main">

                                <div class="order-history-icon">
                                    🛍️
                                </div>

                                <div class="order-history-details">

                                    <div class="order-history-top">

                                        <strong>
                                            Order #{{ $order->id }}
                                        </strong>

                                        <span
                                            class="order-status
                                            status-{{ strtolower($order->status) }}">

                                            {{ ucfirst($order->status) }}

                                        </span>

                                    </div>

                                    <div class="order-history-meta">

                                        <span>
                                            📅
                                            {{ $order->created_at->format('d M Y, h:i A') }}
                                        </span>

                                        <span>
                                            💳
                                            {{ strtoupper($order->payment_method) }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            <div class="order-history-right">

                                <strong class="order-history-total">
                                    ৳ {{ number_format($order->total, 2) }}
                                </strong>

                                <a
                                    href="{{ route('checkout.success', $order) }}"
                                    class="order-view-btn">

                                    View Order →

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="order-empty-state">

                    <div class="order-empty-icon">
                        📦
                    </div>

                    <h3>
                        No Orders Yet
                    </h3>

                    <p>
                        You haven't placed any orders yet.
                        Start shopping and your orders will appear here.
                    </p>

                    <a
                        href="{{ route('products') }}"
                        class="order-shop-btn">

                        Start Shopping

                    </a>

                </div>

            @endif

        </div>


        {{-- Account Status --}}
        <div class="account-card account-status-card">

            <div class="account-card-header">

                <div class="account-icon">
                    🛡️
                </div>

                <div>

                    <h2>
                        Account Status
                    </h2>

                    <p>
                        Your TechHub account status
                    </p>

                </div>

            </div>


            <div class="status-row">

                <span>
                    Account
                </span>

                <strong class="status-active">
                    ● Active
                </strong>

            </div>


            <div class="status-row">

                <span>
                    Login Email
                </span>

                <strong>
                    {{ $user->email }}
                </strong>

            </div>

        </div>


        {{-- Logout --}}
        <div class="account-card logout-card">

            <div>

                <h3>
                    Ready to leave?
                </h3>

                <p>
                    You can safely logout from your TechHub account.
                </p>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="btn-account-logout">

                    Logout

                </button>

            </form>

        </div>


    </div>

</div>
```

</section>

<style>

/* =========================================
   ACCOUNT PAGE
========================================= */

.account-page-section {

    padding: 70px 0 90px;

    background: var(--th-bg, #0b0b0b);

    min-height: calc(100vh - 160px);

}


/* =========================================
   PAGE HEADER
========================================= */

.account-page-header {

    text-align: center;

    margin-bottom: 45px;

}


.account-badge {

    display: inline-block;

    padding: 8px 16px;

    margin-bottom: 16px;

    background: #e63946;

    color: #fff;

    border-radius: 8px;

    font-size: 14px;

    font-weight: 700;

}


.account-page-header h1 {

    margin: 0 0 12px;

    color: #fff;

    font-size: clamp(32px, 5vw, 52px);

    font-weight: 800;

}


.account-page-header p {

    margin: 0;

    color: #9ca3af;

    font-size: 16px;

}


/* =========================================
   ACCOUNT GRID
========================================= */

.account-layout {

    max-width: 1100px;

    margin: 0 auto;

    display: grid;

    grid-template-columns: repeat(2, minmax(0, 1fr));

    gap: 24px;

}


/* =========================================
   ACCOUNT CARD
========================================= */

.account-card {

    background: #151515;

    border: 1px solid #2d2d2d;

    border-radius: 14px;

    padding: 28px;

    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);

}


.account-card-header {

    display: flex;

    align-items: center;

    gap: 15px;

    margin-bottom: 25px;

}


.account-icon {

    width: 46px;

    height: 46px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

    background: #21151a;

    border: 1px solid #3a2025;

    border-radius: 10px;

    font-size: 22px;

}


.account-card-header h2 {

    margin: 0 0 4px;

    color: #fff;

    font-size: 21px;

    font-weight: 700;

}


.account-card-header p {

    margin: 0;

    color: #8d939b;

    font-size: 13px;

}


/* =========================================
   PROFILE INFORMATION
========================================= */

.account-info-list {

    display: flex;

    flex-direction: column;

    gap: 0;

}


.account-info-item {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    padding: 17px 0;

    border-bottom: 1px solid #292929;

}


.account-info-item:first-child {

    padding-top: 0;

}


.account-info-item:last-child {

    border-bottom: none;

    padding-bottom: 0;

}


.account-info-label {

    color: #8d939b;

    font-size: 14px;

}


.account-info-item strong {

    color: #fff;

    font-size: 14px;

    text-align: right;

    word-break: break-word;

}


/* =========================================
   QUICK ACTIONS
========================================= */

.account-actions {

    display: flex;

    flex-direction: column;

    gap: 12px;

}


.account-action {

    display: flex;

    align-items: center;

    gap: 14px;

    padding: 14px 15px;

    background: #101010;

    border: 1px solid #292929;

    border-radius: 10px;

    text-decoration: none;

    transition:
        background 0.2s ease,
        border-color 0.2s ease,
        transform 0.2s ease;

}


.account-action:hover {

    background: #1c1c1c;

    border-color: #e63946;

    transform: translateX(3px);

}


.action-icon {

    width: 38px;

    height: 38px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

    background: #1b1b1b;

    border-radius: 8px;

    font-size: 18px;

}


.action-content {

    flex: 1;

    display: flex;

    flex-direction: column;

    gap: 3px;

}


.action-content strong {

    color: #fff;

    font-size: 14px;

}


.action-content small {

    color: #777f89;

    font-size: 12px;

}


.action-arrow {

    color: #e63946;

    font-size: 20px;

    font-weight: 700;

}


/* =========================================
   ORDER HISTORY
========================================= */

.order-history-card {

    grid-column: 1 / -1;

}


.order-history-list {

    display: flex;

    flex-direction: column;

    gap: 12px;

}


.order-history-item {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    padding: 17px;

    background: #101010;

    border: 1px solid #292929;

    border-radius: 10px;

    transition:
        border-color 0.2s ease,
        background 0.2s ease;

}


.order-history-item:hover {

    background: #181818;

    border-color: #3a3a3a;

}


.order-history-main {

    display: flex;

    align-items: center;

    gap: 14px;

    min-width: 0;

}


.order-history-icon {

    width: 42px;

    height: 42px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

    background: #1b1b1b;

    border-radius: 9px;

    font-size: 19px;

}


.order-history-details {

    min-width: 0;

}


.order-history-top {

    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 10px;

    margin-bottom: 7px;

}


.order-history-top strong {

    color: #fff;

    font-size: 15px;

}


.order-status {

    display: inline-flex;

    align-items: center;

    padding: 4px 9px;

    border-radius: 999px;

    background: #242424;

    color: #d1d5db;

    font-size: 11px;

    font-weight: 700;

}


.status-pending {

    background: #332b16;

    color: #f5c542;

}


.status-processing {

    background: #172b3b;

    color: #5bbcff;

}


.status-shipped {

    background: #20213b;

    color: #9b9dff;

}


.status-delivered {

    background: #173321;

    color: #35c759;

}


.status-cancelled {

    background: #351b1e;

    color: #ff6673;

}


.order-history-meta {

    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 14px;

    color: #777f89;

    font-size: 12px;

}


.order-history-right {

    display: flex;

    align-items: flex-end;

    flex-direction: column;

    gap: 8px;

    flex-shrink: 0;

}


.order-history-total {

    color: #fff;

    font-size: 15px;

}


.order-view-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 7px 12px;

    background: #e63946;

    color: #fff;

    border-radius: 7px;

    text-decoration: none;

    font-size: 11px;

    font-weight: 700;

    transition:
        background 0.2s ease,
        transform 0.2s ease;

}


.order-view-btn:hover {

    background: #c92f3b;

    color: #fff;

    transform: translateY(-1px);

}


/* =========================================
   ORDER EMPTY STATE
========================================= */

.order-empty-state {

    padding: 35px 20px;

    text-align: center;

    background: #101010;

    border: 1px dashed #303030;

    border-radius: 10px;

}


.order-empty-icon {

    width: 55px;

    height: 55px;

    margin: 0 auto 14px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #1b1b1b;

    border-radius: 12px;

    font-size: 25px;

}


.order-empty-state h3 {

    margin: 0 0 8px;

    color: #fff;

    font-size: 18px;

}


.order-empty-state p {

    max-width: 500px;

    margin: 0 auto 18px;

    color: #777f89;

    font-size: 13px;

    line-height: 1.6;

}


.order-shop-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 10px 18px;

    background: #e63946;

    color: #fff;

    border-radius: 8px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;

    transition: background 0.2s ease;

}


.order-shop-btn:hover {

    background: #c92f3b;

    color: #fff;

}


/* =========================================
   ACCOUNT STATUS
========================================= */

.account-status-card {

    grid-column: 1 / -1;

}


.status-row {

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding: 16px 0;

    border-bottom: 1px solid #292929;

    gap: 20px;

}


.status-row:last-child {

    border-bottom: none;

    padding-bottom: 0;

}


.status-row span {

    color: #8d939b;

    font-size: 14px;

}


.status-row strong {

    color: #fff;

    font-size: 14px;

    text-align: right;

    word-break: break-word;

}


.status-active {

    color: #35c759 !important;

}


/* =========================================
   LOGOUT CARD
========================================= */

.logout-card {

    grid-column: 1 / -1;

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 25px;

}


.logout-card h3 {

    margin: 0 0 6px;

    color: #fff;

    font-size: 18px;

}


.logout-card p {

    margin: 0;

    color: #777f89;

    font-size: 13px;

}


.btn-account-logout {

    border: none;

    padding: 11px 22px;

    background: #e63946;

    color: #fff;

    border-radius: 8px;

    font-size: 14px;

    font-weight: 700;

    cursor: pointer;

    transition:
        background 0.2s ease,
        transform 0.2s ease;

}


.btn-account-logout:hover {

    background: #c92f3b;

    transform: translateY(-1px);

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .account-page-section {

        padding: 45px 0 60px;

    }


    .account-page-header {

        margin-bottom: 30px;

    }


    .account-page-header h1 {

        font-size: 34px;

    }


    .account-page-header p {

        font-size: 14px;

        padding: 0 15px;

    }


    .account-layout {

        grid-template-columns: 1fr;

        gap: 16px;

    }


    .account-card {

        padding: 20px;

    }


    .account-status-card,

    .order-history-card,

    .logout-card {

        grid-column: auto;

    }


    .logout-card {

        align-items: stretch;

        flex-direction: column;

    }


    .btn-account-logout {

        width: 100%;

    }


    .account-info-item,

    .status-row {

        align-items: flex-start;

        flex-direction: column;

        gap: 7px;

    }


    .account-info-item strong,

    .status-row strong {

        text-align: left;

    }


    .order-history-item {

        align-items: flex-start;

        flex-direction: column;

    }


    .order-history-right {

        width: 100%;

        align-items: stretch;

    }


    .order-history-total {

        text-align: left;

    }


    .order-view-btn {

        width: 100%;

    }

}


/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 480px) {

    .account-page-section {

        padding: 35px 0 50px;

    }


    .account-page-header h1 {

        font-size: 29px;

    }


    .account-card-header h2 {

        font-size: 18px;

    }


    .account-card-header p {

        font-size: 12px;

    }


    .account-action {

        padding: 12px;

    }


    .order-history-item {

        padding: 14px;

    }


    .order-history-meta {

        flex-direction: column;

        align-items: flex-start;

        gap: 5px;

    }

}

</style>

@endsection
