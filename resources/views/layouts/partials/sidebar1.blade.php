<!--begin::sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="#">
            <img alt="Logo" src="{{ URL::asset('front/logod.jpg') }}"
                class="h-50px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ URL::asset('front/logod.jpg') }}"
                class="h-50px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--end:Menu link-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="{{ request()->is('/') ? 'menu-link active' : 'menu-link' }}"
                            href="{{ route('dashboard') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    @can('product-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('categories') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('categories.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Categories</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('products') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('products.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Products</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('bundles') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('bundles.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Bundles</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('attribute-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('attributes') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('attributes.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Atributes</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('order-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('orders') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('orders.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Orders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('role-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('roles') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('roles.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('user-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('users') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('users.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('drivers-order')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('drivers') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('drivers.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Drivers Orders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('todays-orders') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('drivers.today') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Drivers Todays Orders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('crm-orders')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('crm-orders') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('crm.orders') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">CRM Orders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('report-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('reports') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('reports.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Product Reports</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('sales-reports') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('reports.sales') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sales Reports</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('report-list')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('rma') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('rma.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Rma</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('invoiced-orders')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('invoiced-orders') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('stores.invoice') }}">
                                <span class="   menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Invoiced Orders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('packed-orders')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="{{ request()->is('packed-orders') ? 'menu-link active' : 'menu-link' }}"
                                href="{{ route('stores.packed') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Packed Orders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan


                </div>

            </div>
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::sidebar-->
