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
            <a class="header-brand1" href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(asset('assetst/images/brand/cart_logo_admin.png')); ?>" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="<?php echo e(asset('assetst/images/brand/cart_logo.png')); ?>" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="<?php echo e(asset('assetst/images/brand/cart_logo.png')); ?>" class="header-brand-img light-logo"
                    alt="logo">
                <img src="<?php echo e(asset('assetst/images/brand/cart_logo_admin.png')); ?>" class="header-brand-img light-logo1"
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
                <li class="slide <?php echo e(request()->is('/') ? 'active' : ''); ?>">
                    <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('dashboard')); ?>" style="text-decoration: none;"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-list')): ?>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-move-resize-variant text-warning"></i><span
                                class="side-menu__label">Products Management</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a>Products Management</a></li>
                            <li class="<?php echo e(request()->is('categories') ? 'active' : ''); ?>" style="text-decoration: none;"><a
                                    href="<?php echo e(route('categories.index')); ?>" class="slide-item"> Categories</a></li>
                            <li class="<?php echo e(request()->is('products') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('products.index')); ?>" class="slide-item" style="text-decoration: none;"> Products</a></li>
                            <li class="<?php echo e(request()->is('products') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('product.state')); ?>" class="slide-item" style="text-decoration: none;"> Products State</a></li>
                            <li class="<?php echo e(request()->is('bundles') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('bundles.index')); ?>" class="slide-item" style="text-decoration: none;"> Bundles</a></li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attribute-list')): ?>
                                <li class="<?php echo e(request()->is('attributes') ? 'active' : ''); ?>"><a
                                        href="<?php echo e(route('attributes.index')); ?>" class="slide-item" style="text-decoration: none;"> Attributes</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-account-multiple"></i><span class="side-menu__label">User
                                Management</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">User Management</a></li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                                <li class="<?php echo e(request()->is('roles') ? 'active' : ''); ?>"><a href="<?php echo e(route('roles.index')); ?>"
                                        class="slide-item" style="text-decoration: none;"> Roles</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                                <li class="<?php echo e(request()->is('users') ? 'active' : ''); ?>"><a href="<?php echo e(route('users.index')); ?>"
                                        class="slide-item" style="text-decoration: none;"> Users</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                            class="side-menu__icon mdi mdi-motorbike"></i><span class="side-menu__label">Rider
                            Orders</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('drivers-order')): ?>
                            <li class="side-menu-label1 "><a href="#" style="text-decoration: none;">Rider Orders</a></li>
                            <li class="<?php echo e(request()->is('drivers') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('drivers.index')); ?>" class="slide-item" style="text-decoration: none;"> Orders</a></li>
                            <li class="<?php echo e(request()->is('todays-orders') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('drivers.today')); ?>" class="slide-item" style="text-decoration: none;"> Today Orders</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm-orders')): ?>
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-note-plus"></i><span class="side-menu__label">CRM</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">CRM</a></li>
                            <li class="<?php echo e(request()->is('crm-orders') ? 'active' : ''); ?>">
                                <a class="side-menu__item" href="<?php echo e(route('crm.orders')); ?>" style="text-decoration: none;"><span
                                        class="side-menu__label">CRM
                                        Orders</span></a>
                            </li>
                            <li class="<?php echo e(request()->is('rma-crm-orders') ? 'active' : ''); ?>">
                                <a class="side-menu__item" href="<?php echo e(route('rma.crm.orders')); ?>" style="text-decoration: none;"><span
                                        class="side-menu__label">RMA CRM
                                        Orders</span></a>
                            </li>

                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-list')): ?>
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-chart-bar"></i><span
                                class="side-menu__label">Reports</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">Reports</a></li>
                            <li class="<?php echo e(request()->is('reports') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('reports.index')); ?>" class="slide-item" style="text-decoration: none;"> Product Reports</a></li>
                            <li class="<?php echo e(request()->is('sales-reports') ? 'active' : ''); ?>" style="text-decoration: none;"><a
                                    href="<?php echo e(route('reports.sales')); ?>" class="slide-item" style="text-decoration: none;"> Sales Reports</a></li>
                            <li class="<?php echo e(request()->is('ads-reports') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('ads_report.index')); ?>" class="slide-item" style="text-decoration: none;"> Ads Reports</a></li>

                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-list')): ?>
                    <li class="<?php echo e(request()->is('orders') ? 'active' : ''); ?>">
                        <a class="side-menu__item" href="<?php echo e(route('orders.index')); ?>" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-package-variant"></i><span
                                class="side-menu__label">Orders</span></a>
                    </li>

                    <li class="<?php echo e(request()->is('missing') ? 'active' : ''); ?>">
                        <a class="side-menu__item" href="<?php echo e(route('missing.index')); ?>" style="text-decoration: none;"><i
                                class="side-menu__icon fa-solid fa-circle-xmark"></i><span
                                class="side-menu__label">Missing</span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('packed-orders')): ?>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-store"></i><span class="side-menu__label">Store
                                Manager</span><i class="angle fe fe-chevron-right hor-angle"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="#" style="text-decoration: none;">Store Manager</a></li>
                            <li class=" <?php echo e(request()->is('confirmed-orders') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('confirmed.orders')); ?>" class="slide-item" style="text-decoration: none;"> Confirmed Orders</a></li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoiced-orders')): ?>
                                <li class="<?php echo e(request()->is('invoiced-orders') ? 'active' : ''); ?>"><a
                                        href="<?php echo e(route('stores.invoice')); ?>" class="slide-item" style="text-decoration: none;"> Invoiced Orders</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('packed-orders')): ?>
                                <li class=" <?php echo e(request()->is('packed-orders') ? 'active' : ''); ?>"><a
                                        href="<?php echo e(route('stores.packed')); ?>" class="slide-item" style="text-decoration: none;">Packed Orders</a></li>
                            <?php endif; ?>

                            <li class=" <?php echo e(request()->is('cancel-orders') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('stores.cancel')); ?>" class="slide-item" style="text-decoration: none;"> For Cancel</a></li>
                            <li class=" <?php echo e(request()->is('rto-orders') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('rto.store')); ?>" class="slide-item" style="text-decoration: none;"> RTO recive</a></li>

                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                    <li class=" <?php echo e(request()->is('coupons') ? 'active' : ''); ?>">
                        <a class="side-menu__item" href="<?php echo e(route('coupons.index')); ?>" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-ticket-confirmation"></i><span
                                class="side-menu__label">Coupons</span></a>
                    </li>
                    <li class=" <?php echo e(request()->is('rma') ? ' active' : ''); ?>">
                        <a class="side-menu__item" href="<?php echo e(route('rma.index')); ?>" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-chart-bubble"></i><span
                                class="side-menu__label">RMA</span></a>
                    </li>
                    <li class=" <?php echo e(request()->is('settings') ? ' active' : ''); ?>">
                        <a class="side-menu__item" href="<?php echo e(route('settings.index')); ?>" style="text-decoration: none;"><i
                                class="side-menu__icon mdi mdi-chart-bubble"></i><span
                                class="side-menu__label">Setting</span></a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ASA\Desktop\winscart_dashboard\winscart\resources\views/components/admin/sidebar.blade.php ENDPATH**/ ?>