<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav" class="p-t-30">
            <li class="sidebar-item"> <a
                    class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('/') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Dashboard</span></a></li>
            @can('product-list')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span
                            class="hide-menu">Products Management </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item {{ request()->is('categories') ? 'active' : '' }}"><a
                                href="{{ route('categories.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Categories </span></a></li>
                        <li class="sidebar-item {{ request()->is('products') ? 'active' : '' }}"><a
                                href="{{ route('products.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Products </span></a>
                        </li>
                        <li class="sidebar-item {{ request()->is('bundles') ? 'active' : '' }}"><a
                                href="{{ route('bundles.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-calendar-check"></i><span class="hide-menu"> Bundles </span></a></li>
                        @can('attribute-list')
                            <li class="sidebar-item {{ request()->is('bundles') ? 'active' : '' }}"><a
                                    href="{{ route('bundles.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Attributes </span></a></li>
                        @endcan

                    </ul>
                </li>
            @endcan
            @can('user-list')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                            class="hide-menu">User Management</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('role-list')
                            <li class="sidebar-item {{ request()->is('roles') ? 'active' : '' }}"><a
                                    href="{{ route('roles.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-account-key"></i><span class="hide-menu"> Roles </span></a></li>
                        @endcan
                        @can('user-list')
                            <li class="sidebar-item {{ request()->is('users') ? 'active' : '' }}"><a
                                    href="{{ route('users.index') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span
                                        class="hide-menu"> Users </span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-motorbike"></i><span
                        class="hide-menu">Rider Orders </span></a>

                <ul aria-expanded="false" class="collapse  first-level">
                    @can('drivers-order')
                        <li class="sidebar-item  {{ request()->is('drivers') ? 'active' : '' }}"><a
                                href="{{ route('drivers.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Orders </span></a></li>
                        <li class="sidebar-item {{ request()->is('todays-orders') ? 'active' : '' }}"><a
                                href="{{ route('drivers.today') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Todays Orders </span></a></li>
                    @endcan

                </ul>

            </li>
            @can('crm-orders')
                <li class="sidebar-item {{ request()->is('crm-orders') ? 'active' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('crm.orders') }}"
                        aria-expanded="false"><i class="mdi mdi-note-plus"></i><span class="hide-menu">CRM Orders</span></a>
                </li>
            @endcan
            @can('report-list')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                            class="hide-menu">Reports </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item ="{{ request()->is('reports') ? 'active' : '' }}"><a
                                href="{{ route('reports.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Product Reports </span></a>
                        </li>
                        <li class="sidebar-item {{ request()->is('sales-reports') ? 'active' : '' }}"><a
                                href="{{ route('reports.sales') }}" class="sidebar-link"><i
                                    class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Sales Reports </span></a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('order-list')
                <li class="sidebar-item {{ request()->is('orders') ? 'active' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('orders.index') }}"
                        aria-expanded="false"><i class="mdi mdi-package-variant"></i><span
                            class="hide-menu">Orders</span></a>
                </li>
                <li class="sidebar-item {{ request()->is('missing') ? 'active' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('missing.index') }}"
                        aria-expanded="false"><i class="fas fa-times-circle"></i><span
                            class="hide-menu">Missing</span></a>
                </li>
            @endcan
            @can('packed-orders')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-store"></i><span
                            class="hide-menu">Store Manager</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item {{ request()->is('confirmed-orders') ? 'active' : '' }}"><a
                                href="{{ route('confirmed.orders') }}" class="sidebar-link"><i
                                    class="mdi mdi-package-up"></i><span class="hide-menu">
                                    Confirmed Orders</span></a></li>
                        @can('invoiced-orders')
                            <li class="sidebar-item {{ request()->is('invoiced-orders') ? 'active' : '' }}"><a
                                    href="{{ route('stores.invoice') }}" class="sidebar-link"><i
                                        class="mdi mdi-printer"></i><span class="hide-menu">
                                        Invoiced Orders</span></a></li>
                        @endcan
                        @can('packed-orders')
                            <li class="sidebar-item {{ request()->is('packed-orders') ? 'active' : '' }}"><a
                                    href="{{ route('stores.packed') }}" class="sidebar-link"><i
                                        class="mdi mdi-package-variant"></i><span class="hide-menu">
                                        Packed Orders</span></a></li>
                        @endcan
                        <li class="sidebar-item {{ request()->is('cancel-orders') ? 'active' : '' }}"><a
                                href="{{ route('stores.cancel') }}" class="sidebar-link"><i
                                    class="mdi mdi-package-variant"></i><span class="hide-menu">
                                    For Cancel</span></a></li>
                        <li class="sidebar-item {{ request()->is('rto-orders') ? 'active' : '' }}"><a
                                href="{{ route('rto.store') }}" class="sidebar-link"><i
                                    class="mdi mdi-package-variant"></i><span class="hide-menu">
                                    RTO recive</span></a></li>
                    </ul>
                </li>
            @endcan
            @can('user-list')
                <li class="sidebar-item {{ request()->is('coupons') ? 'active' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('coupons.index') }}"
                        aria-expanded="false"><i class="mdi mdi-ticket-confirmation"></i><span
                            class="hide-menu">Coupons</span></a>
                </li>

                <li class="sidebar-item {{ request()->is('rma') ? ' active' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('rma.index') }}"
                        aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">RMA</span></a>
                </li>
                <li class="sidebar-item {{ request()->is('settings') ? ' active' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('settings.index') }}"
                        aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Settings</span></a>
                </li>
            @endcan
        </ul>
    </nav>
</div>
