<style>
    .custom-scrollbar {
        overflow-y: auto;
        scrollbar-width: thin;
        /* For Firefox */
        scrollbar-color: #e2e6ea #f1f1f1;
        /* Thumb and track colors */

        /* For Webkit Browsers */
        &::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
        }

        &::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Scrollbar thumb color */
            border-radius: 4px;
            /* Round edges */
        }

        &::-webkit-scrollbar-thumb:hover {
            background-color: #555;
            /* Thumb color on hover */
        }

        &::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Scrollbar track color */
        }
    }

    .app-sidebar {
        height: 100vh;
        overflow-y: hidden;
        /* Prevent scrollbars from appearing on the entire sidebar */
    }

    .main-sidemenu {
        max-height: calc(100vh - 100px);
        /* Adjust for header/footer */
    }
</style>
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset('assetst/images/brand/cart_logo_admin.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('assetst/images/brand/cart_logo.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('assetst/images/brand/cart_logo.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ asset('assetst/images/brand/cart_logo_admin.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu custom-scrollbar">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="slide {{ request()->is('/') ? 'active' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('dashboard') }}" style="text-decoration: none;"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                @can('product-list')
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-move-resize-variant text-warning"></i><span
                                class="side-menu__label">Products Management</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a>Products Management</a></li>
                            <li class="{{ request()->is('categories') ? 'active' : '' }}" style="text-decoration: none;"><a
                                    href="{{ route('categories.index') }}" class="slide-item"> Categories</a></li>
                            <li class="{{ request()->is('products') ? 'active' : '' }}"><a
                                    href="{{ route('products.index') }}" class="slide-item" style="text-decoration: none;"> Products</a></li>
                            <li class="{{ request()->is('products') ? 'active' : '' }}"><a
                                    href="{{ route('product.state') }}" class="slide-item" style="text-decoration: none;"> Products State</a></li>
                            <li class="{{ request()->is('bundles') ? 'active' : '' }}"><a
                                    href="{{ route('bundles.index') }}" class="slide-item" style="text-decoration: none;"> Bundles</a></li>
                            @can('attribute-list')
                                <li class="{{ request()->is('attributes') ? 'active' : '' }}"><a
                                        href="{{ route('attributes.index') }}" class="slide-item" style="text-decoration: none;"> Attributes</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user-list')
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-account-multiple"></i><span class="side-menu__label">User
                                Management</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">User Management</a></li>
                            @can('role-list')
                                <li class="{{ request()->is('roles') ? 'active' : '' }}"><a href="{{ route('roles.index') }}"
                                        class="slide-item" style="text-decoration: none;"> Roles</a></li>
                            @endcan
                            @can('user-list')
                                <li class="{{ request()->is('users') ? 'active' : '' }}"><a href="{{ route('users.index') }}"
                                        class="slide-item" style="text-decoration: none;"> Users</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                            class="side-menu__icon mdi mdi-motorbike"></i><span class="side-menu__label">Rider
                            Orders</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        @can('drivers-order')
                            <li class="side-menu-label1 "><a href="#" style="text-decoration: none;">Rider Orders</a></li>
                            <li class="{{ request()->is('drivers') ? 'active' : '' }}"><a
                                    href="{{ route('drivers.index') }}" class="slide-item" style="text-decoration: none;"> Orders</a></li>
                            <li class="{{ request()->is('todays-orders') ? 'active' : '' }}"><a
                                    href="{{ route('drivers.today') }}" class="slide-item" style="text-decoration: none;"> Today Orders</a></li>
                        @endcan
                    </ul>
                </li>
                {{-- @can('crm-orders')
                    <li class="{{ request()->is('crm-orders') ? 'active' : '' }}">
                        <a class="side-menu__item" href="{{ route('crm.orders') }}"><i
                                class="side-menu__icon mdi mdi-note-plus"></i><span class="side-menu__label">CRM
                                Orders</span></a>
                    </li>
                @endcan --}}
                @can('crm-orders')
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-note-plus"></i><span class="side-menu__label">CRM</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">CRM</a></li>
                            <li class="{{ request()->is('crm-orders') ? 'active' : '' }}">
                                <a class="side-menu__item" href="{{ route('crm.orders') }}" style="text-decoration: none;"><span
                                        class="side-menu__label">CRM
                                        Orders</span></a>
                            </li>
                            <li class="{{ request()->is('rma-crm-orders') ? 'active' : '' }}">
                                <a class="side-menu__item" href="{{ route('rma.crm.orders') }}" style="text-decoration: none;"><span
                                        class="side-menu__label">RMA CRM
                                        Orders</span></a>
                            </li>

                        </ul>
                    </li>
                @endcan
                @can('report-list')
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-chart-bar"></i><span
                                class="side-menu__label">Reports</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">Reports</a></li>
                            <li class="{{ request()->is('reports') ? 'active' : '' }}"><a
                                    href="{{ route('reports.index') }}" class="slide-item" style="text-decoration: none;"> Product Reports</a></li>
                            <li class="{{ request()->is('sales-reports') ? 'active' : '' }}" style="text-decoration: none;"><a
                                    href="{{ route('reports.sales') }}" class="slide-item" style="text-decoration: none;"> Sales Reports</a></li>
                            <li class="{{ request()->is('ads-reports') ? 'active' : '' }}"><a
                                    href="{{ route('ads_report.index') }}" class="slide-item" style="text-decoration: none;"> Ads Reports</a></li>

                        </ul>
                    </li>
                @endcan
                @can('order-list')
                    <li class="{{ request()->is('orders') ? 'active' : '' }}">
                        <a class="side-menu__item" href="{{ route('orders.index') }}" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-package-variant"></i><span
                                class="side-menu__label">Orders</span></a>
                    </li>

                    <li class="{{ request()->is('missing') ? 'active' : '' }}">
                        <a class="side-menu__item" href="{{ route('missing.index') }}" style="text-decoration: none;"><i
                                class="side-menu__icon fa-solid fa-circle-xmark"></i><span
                                class="side-menu__label">Missing</span></a>
                    </li>
                @endcan
                @can('packed-orders')
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-store"></i><span class="side-menu__label">Store
                                Manager</span><i class="angle fe fe-chevron-right hor-angle"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">Store Manager</a></li>
                            <li class=" {{ request()->is('confirmed-orders') ? 'active' : '' }}"><a
                                    href="{{ route('confirmed.orders') }}" class="slide-item" style="text-decoration: none;"> Confirmed Orders</a></li>
                            @can('invoiced-orders')
                                <li class="{{ request()->is('invoiced-orders') ? 'active' : '' }}"><a
                                        href="{{ route('stores.invoice') }}" class="slide-item" style="text-decoration: none;"> Invoiced Orders</a></li>
                            @endcan
                            @can('packed-orders')
                                <li class=" {{ request()->is('packed-orders') ? 'active' : '' }}"><a
                                        href="{{ route('stores.packed') }}" class="slide-item" style="text-decoration: none;">Packed Orders</a></li>
                            @endcan

                            <li class=" {{ request()->is('cancel-orders') ? 'active' : '' }}"><a
                                    href="{{ route('stores.cancel') }}" class="slide-item" style="text-decoration: none;"> For Cancel</a></li>
                            <li class=" {{ request()->is('rto-orders') ? 'active' : '' }}"><a
                                    href="{{ route('rto.store') }}" class="slide-item" style="text-decoration: none;"> RTO recive</a></li>

                        </ul>
                    </li>
                @endcan
                @can('user-list')
                    <li class=" {{ request()->is('coupons') ? 'active' : '' }}">
                        <a class="side-menu__item" href="{{ route('coupons.index') }}" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-ticket-confirmation"></i><span
                                class="side-menu__label">Coupons</span></a>
                    </li>
                    <li class=" {{ request()->is('rma') ? ' active' : '' }}">
                        <a class="side-menu__item" href="{{ route('rma.index') }}" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-chart-bubble"></i><span
                                class="side-menu__label">RMA</span></a>
                    </li>
                    <li class=" {{ request()->is('settings') ? ' active' : '' }}">
                        <a class="side-menu__item" href="{{ route('settings.index') }}" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-chart-bubble"></i><span
                                class="side-menu__label">Setting</span></a>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
