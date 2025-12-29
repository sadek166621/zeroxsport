@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<style>
    .submenu {
        background-color: #4581b6 !important;
    }

    .submenu a:before {
        content: none !important;
    }

    .submenu a {
        padding-right: 0 !important;
    }
</style>
<aside class="navbar-aside" id="offcanvas_aside" style="background-color: #365486">
    <div class="aside-top">
        <a href="{{ route('admin.dashboard') }}" class="brand-wrap">
            @php
                $logo = get_setting('site_logo');
            @endphp
            @if ($logo != null)
                <img src="{{ asset(get_setting('site_logo')->value ?? ' ') }}" alt="{{ env('APP_NAME') }}"
                    style="height: 30px !important;">
            @else
                <img src="{{ asset('upload/no_image.jpg') }}" alt="{{ env('APP_NAME') }}"
                    style="height: 30px !important; width: 80px !important; min-width: 80px !important;">
            @endif
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="fa fa-arrow-left text-white"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.dashboard') }}" style="background-color: transparent">
                    <i class="fa-solid fa-house fontawesome_icon_custom"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li
                class="menu-item has-submenu
                {{ $route == 'slider.index' ? 'active' : '' }}
                {{ $route == 'slider.edit' ? 'active' : '' }}
                {{ $route == 'slider.create' ? 'active' : '' }}
            ">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('37', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="fa fa-sliders fontawesome_icon_custom"></i>
                        <span class="text">Sliders</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('37', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'slider.index' ? 'active' : '' }}"
                            href="{{ route('slider.index') }}">Slider List</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('37', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'slider.create' ? 'active' : '' }}"
                            href="{{ route('slider.create') }}">Slider Add</a>
                    @endif
                </div>
            </li>

            <li
                class="menu-item has-submenu
                {{ $prefix == 'admin/product' || $prefix == 'admin/category' || $prefix == 'admin/unit' || $route == 'attribute.index' || $prefix == 'admin/brand' ? 'active' : '' }}
            ">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('1', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        {{--                        <i class="fa-solid fa-bag-shopping fontawesome_icon_custom"></i> --}}
                        <i class="fa-solid fa-cart-shopping fontawesome_icon_custom"></i>
                        <span class="text">Products</span>
                    </a>
                @endif
                <div class="submenu vendor-submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('1', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'product.add' ? 'active' : '' }}"
                            href="{{ route('product.add') }}">Product Add</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('2', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'product.all' ? 'active' : '' }}"
                            href="{{ route('product.all') }}">Products</a>
                    @endif

                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('2', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'product.affiliate' ? 'active' : '' }}"
                            href="{{ route('product.affiliate') }}">Affiliate Products</a>
                    @endif

                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('2', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'product.wholesell' ? 'active' : '' }}"
                            href="{{ route('product.wholesell') }}">Wholesell Products</a>
                    @endif

                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('5', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $prefix == 'admin/category' ? 'active' : '' }}"
                            href="{{ route('category.index') }}">Categories</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('13', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'attribute.index' ? 'active' : '' }}"
                            href="{{ route('attribute.index') }}">Attributes</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('53', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'unit.index' ? 'active' : '' }}"
                            href="{{ route('unit.index') }}">Unit</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('9', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $prefix == 'admin/brand' ? 'active' : '' }}"
                            href="{{ route('brand.all') }}">Brands</a>
                    @endif
                </div>
            </li>

            {{-- comission structure start --}}
            <li
                class="menu-item has-submenu
                {{ $route == 'commission.index' ? 'active' : '' }}
                {{ $route == 'commission.create' ? 'active' : '' }}
            ">
                <a class="menu-link" href="#">
                    <i class="fa fa-sliders fontawesome_icon_custom"></i>
                    <span class="text">Commission Structure</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'commission.index' ? 'active' : '' }}"
                        href="{{ route('commission.index') }}">Commission List</a>
                    <a class="{{ $route == 'commission.create' ? 'active' : '' }}"
                        href="{{ route('commission.create') }}">Commission Add</a>

                </div>
            </li>
            {{-- comission structure end --}}

            {{-- Seller Penalty start --}}
            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'seller.penalty.index' ? 'active' : '' }}
                {{ $route == 'seller.penalty.create' ? 'active' : '' }}
            ">
                    <a class="menu-link" href="#">
                        <i class="fa fa-sliders fontawesome_icon_custom"></i>
                        <span class="text">Seller Penalty</span>
                    </a>
                    <div class="submenu">
                        <a class="{{ $route == 'seller.penalty.index' ? 'active' : '' }}"
                            href="{{ route('seller.penalty.index') }}">Seller Penalty List</a>
                        <a class="{{ $route == 'seller.penalty.create' ? 'active' : '' }}"
                            href="{{ route('seller.penalty.create') }}">Seller Penalty Create</a>

                    </div>
                </li>
            @endif
            {{-- Seller Penalty end --}}

            @if (Auth::guard('admin')->user()->role == '1')
                @if (get_setting('multi_vendor')->value)
                    <li
                        class="menu-item has-submenu
                        {{ $route == 'vendor.index' ? 'active' : '' }}
                        {{ $route == 'vendor.edit' ? 'active' : '' }}
                        {{ $route == 'vendor.create' ? 'active' : '' }}
                    ">
                        <a class="menu-link " href="#">
                            <i class="icon material-icons md-person_add"></i>
                            <span class="text">Vendors</span>
                        </a>
                        <div class="submenu">
                            <a class="{{ $route == 'vendor.all.pending' ? 'active' : '' }}"
                                href="{{ route('vendor.all.pending') }}">Pending Prodcuts</a>
                            <a class="{{ $route == 'vendor.all.approved' ? 'active' : '' }}"
                                href="{{ route('vendor.all.approved') }}">Approved Prodcuts</a>
                            <a class="{{ $route == 'vendor.request' ? 'active' : '' }}"
                                href="{{ route('vendor.sell.request') }}">Vendor Request</a>
                            <a class="{{ $route == 'vendor.index' ? 'active' : '' }}"
                                href="{{ route('vendor.index') }}">Vendor List</a>
                            <a class="{{ $route == 'vendor.create' ? 'active' : '' }}"
                                href="{{ route('vendor.create') }}">Vendor Add</a>
                        </div>
                    </li>
                @endif
            @endif
            @if (Auth::guard('admin')->user()->role == '2' || Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                            {{ $route == 'transaction.summary' ? 'active' : '' }}
                            {{ $route == 'payment.index' ? 'active' : '' }}
                            {{ $route == 'payment.edit' ? 'active' : '' }}
                            {{ $route == 'payment.create' ? 'active' : '' }}
                            {{ $route == 'withdraw-requests.index' ? 'active' : '' }}
                            {{ $route == 'withdraw-requests.create' ? 'active' : '' }}
                            {{ $route == 'transaction.index' ? 'active' : '' }}">
                    <a class="menu-link " href="#">
                        <i class="icon material-icons md-attach_money"></i>
                        <span class="text">Vendor Accounts</span>
                    </a>
                    <div class="submenu">
                        @if (Auth::guard('admin')->user()->role == 1)
                            <a class="{{ $route == 'payment.create' ? 'active' : '' }}"
                                href="{{ route('transaction.summary') }}">Account Summary</a>
                        @endif
                        <a class="{{ $route == 'withdraw-requests.index' ? 'active' : '' }}"
                            href="{{ route('withdraw-requests.index') }}">Withdrawal Requests</a>
                        @if (Auth::guard('admin')->user()->role == 2)
                            <a class="{{ $route == 'withdraw-requests.create' ? 'active' : '' }}"
                                href="{{ route('withdraw-requests.create') }}">Add Withdrawal Request</a>
                            <a class="{{ $route == 'transaction.index' ? 'active' : '' }}"
                                href="{{ route('transaction.index') }}">View Transactions</a>
                        @endif
                        @if (Auth::guard('admin')->user()->role == 1)
                            <a class="{{ $route == 'payment.create' ? 'active' : '' }}"
                                href="{{ route('payment.create') }}">Payment Add</a>
                            <a class="{{ $route == 'payment.index' ? 'active' : '' }}"
                                href="{{ route('payment.index') }}">Payment List</a>
                        @endif

                    </div>
                </li>
            @endif
            <li
                class="menu-item has-submenu
                {{ $route == 'campaing.index' ? 'active' : '' }}
                {{ $route == 'campaing.create' ? 'active' : '' }}
                {{ $route == 'campaing.edit' ? 'active' : '' }}
            ">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('41', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="fa-solid fa-rectangle-ad fontawesome_icon_custom"></i>
                        <span class="text">Campaigns</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('41', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'campaing.index' ? 'active' : '' }}"
                            href="{{ route('campaing.index') }}">Campaign List</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('42', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'campaing.create' ? 'active' : '' }}"
                            href="{{ route('campaing.create') }}">Campaign Add</a>
                    @endif
                </div>
            </li>
            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'coupons.index' ? 'active' : '' }}
                {{ $route == 'coupons.create' ? 'active' : '' }}
                {{ $route == 'coupons.edit' ? 'active' : '' }}
            ">
                    <a class="menu-link" href="#">
                        <i class="fa-solid fa-ticket fontawesome_icon_custom"></i>
                        <span class="text">Coupons</span>
                    </a>
                    <div class="submenu">
                        <a class="{{ $route == 'coupons.index' ? 'active' : '' }}"
                            href="{{ route('coupons.index') }}">Coupon List</a>
                        <a class="{{ $route == 'coupons.create' ? 'active' : '' }}"
                            href="{{ route('coupons.create') }}">Coupon Add</a>
                    </div>
                </li>
            @endif
            <li class="menu-item has-submenu {{ $prefix == 'admin/supplier' ? 'active' : '' }}">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('45', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link " href="#">
                        <i class="fas fa-truck fontawesome_icon_custom"></i>
                        <span class="text">Suppliers</span>
                    </a>
                @endif
                <div class="submenu vendor-submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('45', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'supplier.all' ? 'active' : '' }}"
                            href="{{ route('supplier.all') }}">Supplier List</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('46', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'supplier.create' ? 'active' : '' }}"
                            href="{{ route('supplier.create') }}">Supplier Add</a>
                    @endif
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'all_orders.index' ? 'active' : '' }}">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('17', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="fas fa-list fontawesome_icon_custom"></i>
                        <span class="text">Orders</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('17', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'all_orders.index' ? 'active' : '' }}"
                            href="{{ route('all_orders.index') }}">Admin Orders</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('17', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'vendor_orders.index' ? 'active' : '' }}"
                            href="{{ route('vendor_orders.index') }}">Vendor Orders</a>
                    @endif


                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('17', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'wholesell.orders' ? 'active' : '' }}"
                            href="{{ route('wholesell.orders') }}">Wholesell Orders</a>
                    @endif
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'return-request.all' ? 'active' : '' }}">
                @if (Auth::guard('admin')->user()->role == '1')
                    <a class="menu-link" href="#">
                        <i class="fas fa-exchange fontawesome_icon_custom"></i>
                        <span class="text">Return Requests</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1')
                        <a class="{{ $route == 'return-request.all' ? 'active' : '' }}"
                            href="{{ route('return-request.all') }}">All Requests</a>
                    @endif
                </div>
            </li>
            {{-- <li class="menu-item has-submenu {{ ($route == 'sms.templates') || ($route == 'sms.providers')?'active':'' }}">
                @if (Auth::guard('admin')->user()->role == '1' || in_array('34', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="fontawesome_icon_custom fa-solid fa-phone"></i>
                        <span class="text">OTP System</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1' || in_array('34', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ ($route == 'sms.templates') ? 'active':'' }}" href="{{ route('sms.templates') }}" >SMS Teamplates</a>
                    @endif

                    @if (Auth::guard('admin')->user()->role == '1' || in_array('34', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ ($route == 'sms.providers') ? 'active':'' }}" href="{{ route('sms.providers') }}" >SMS Providers</a>
                    @endif
                </div>
            </li> --}}
            <li
                class="menu-item has-submenu
                {{ $route == 'staff.index' ? 'active' : '' }}
                {{ $route == 'staff.create' ? 'active' : '' }}
                {{ $route == 'staff.edit' ? 'active' : '' }}
                {{ $route == 'roles.index' ? 'active' : '' }}
                {{ $route == 'roles.create' ? 'active' : '' }}
                {{ $route == 'roles.edit' ? 'active' : '' }}
            ">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('25', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="fas fa-people-group fontawesome_icon_custom"></i>
                        <span class="text">Staff</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('25', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'staff.index' ? 'active' : '' }}"
                            href="{{ route('staff.index') }}">All Staff</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('29', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'roles.index' ? 'active' : '' }}"
                            href="{{ route('roles.index') }}">Staff Premissions</a>
                    @endif
                </div>
            </li>
            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'stock_report.index' ? 'active' : '' }}
            ">
                    <a class="menu-link" href="#">
                        <i class="fas fa-file-text fontawesome_icon_custom"></i>
                        <span class="text">Report</span>
                    </a>
                    <div class="submenu vendor-submenu">
                        <a class="{{ $route == 'report.category.sales' ? 'active' : '' }}"
                        href="{{ route('report.category.sales') }}">
                        Category-wise Sales
                    </a>
                        <a class="{{ $route == 'stock_report.index' ? 'active' : '' }}"
                            href="{{ route('stock_report.index') }}">Product Stock</a>
                    </div>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'banner.index' ? 'active' : '' }}
                {{ $route == 'banner.edit' ? 'active' : '' }}
                {{ $route == 'banner.create' ? 'active' : '' }}
            ">
                    <a class="menu-link" href="#">
                        <i class="fa fa-image fontawesome_icon_custom"></i>
                        <span class="text">Banner</span>
                    </a>
                    <div class="submenu">
                        <a class="{{ $route == 'banner.index' ? 'active' : '' }}"
                            href="{{ route('banner.index') }}">Banner List</a>
                        <a class="{{ $route == 'banner.create' ? 'active' : '' }}"
                            href="{{ route('banner.create') }}">Banner Add</a>
                    </div>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'subscribers.index' ? 'active' : '' }}
            ">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Subscribers</span>
                    </a>
                    <div class="submenu">
                        <a class="{{ $route == 'subscribers.index' ? 'active' : '' }}"
                            href="{{ route('subscribers.index') }}">Subsribers List</a>
                    </div>
                </li>
            @endif

            <li
                class="menu-item has-submenu
                {{ $route == 'blog.index' ? 'active' : '' }}
                {{ $route == 'blog.edit' ? 'active' : '' }}
                {{ $route == 'blog.create' ? 'active' : '' }}
            ">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('21', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-comment"></i>
                        <span class="text">Blog</span>
                    </a>
                @endif
                <div class="submenu">
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('21', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'blog.index' ? 'active' : '' }}"
                            href="{{ route('blog.index') }}">Blog List</a>
                    @endif
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('22', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'blog.create' ? 'active' : '' }}"
                            href="{{ route('blog.create') }}">Blog Add</a>
                    @endif
                </div>
            </li>

            <li
                class="menu-item has-submenu
                {{ $route == 'page.index' ? 'active' : '' }}
                {{ $route == 'page.edit' ? 'active' : '' }}
                {{ $route == 'page.create' ? 'active' : '' }}
            ">
                @if (Auth::guard('admin')->user()->role == '1' ||
                        in_array('49', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-pages"></i>
                        <span class="text">Pages</span>
                    </a>
                @endif
                <div class="submenu">
                    {{-- @if (Auth::guard('admin')->user()->role == '1' || in_array('49', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ ($route == 'page.index') ? 'active':'' }}" href="{{ route('page.index') }}">Page List</a>
                    @endif --}}
                    @if (Auth::guard('admin')->user()->role == '1' ||
                            in_array('50', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                        <a class="{{ $route == 'page.create' ? 'active' : '' }}"
                            href="{{ route('page.create') }}">Pages</a>
                    @endif
                </div>
            </li>
            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'accounts.heads' ? 'active' : '' }}
                {{ $route == 'accounts.ledgers' ? 'active' : '' }}
                {{ $route == 'accounts.heads.create' ? 'active' : '' }}
                ">
                    <a class="menu-link" href="#">
                        <i class="fas fa-money-check-dollar fontawesome_icon_custom"></i>
                        <span class="text">Accounts</span>
                    </a>
                    <div class="submenu">
                        <a class="{{ $route == 'accounts.heads' ? 'active' : '' }} {{ $route == 'accounts.heads.create' ? 'active' : '' }}"
                            href="{{ route('accounts.heads') }}">Account Heads</a>
                        <a class="{{ $route == 'accounts.ledgers' ? 'active' : '' }}"
                            href="{{ route('accounts.ledgers') }}">Cashbook</a>
                    </div>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'customer.index' ? 'active' : '' }}
                ">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-person"></i>
                        <span class="text">Customers</span>
                    </a>

                    <div class="submenu">
                        <a class="{{ $route == 'customer.index' ? 'active' : '' }}"
                            href="{{ route('customer.index') }}">Customer list</a>
                    </div>
                </li>
            @endif
            @if (Auth::guard('admin')->user()->role == '1')
                <li class="menu-item has-submenu {{ $route == 'affiliates.index' ? 'active' : '' }}">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-group"></i>
                        <span class="text">Affiliates</span>
                    </a>

                    <div class="submenu">
                        <a class="{{ $route == 'affiliates.index' ? 'active' : '' }}"
                            href="{{ route('affiliates.index') }}">
                            Affiliate List
                        </a>
                        <a class="{{ $route == 'affiliate.earnings' ? 'active' : '' }}"
                            href="{{ route('affiliate.earnings') }}">
                            Earnings Report
                        </a>
                        <a class="{{ $route == 'affiliate.products' ? 'active' : '' }}"
                            href="{{ route('affiliate.products') }}">
                            All Affiliate Products
                        </a>
                        <a class="{{ $route == 'admin.affiliate.products' ? 'active' : '' }}"
                            href="{{ route('admin.affiliate.products') }}">
                            Admin Affiliate Products
                        </a>
                        <a class="{{ $route == 'vendor.affiliate.products' ? 'active' : '' }}"
                            href="{{ route('vendor.affiliate.products') }}">
                            Vendor Affiliate Products
                        </a>
                    </div>
                </li>
            @endif



            @if (Auth::guard('admin')->user()->role == '1')
                <li
                    class="menu-item has-submenu
                {{ $route == 'messages.list' ? 'active' : '' }}
                ">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-message"></i>
                        <span class="text">Messages</span>
                    </a>

                    <div class="submenu">
                        <a class="{{ $route == 'messages.list' ? 'active' : '' }}"
                            href="{{ route('messages.list') }}">User Messages</a>
                    </div>
                </li>
            @endif
        </ul>
        <hr />
        @if (Auth::guard('admin')->user()->role == '1')
            <ul class="menu-aside">
                <li
                    class="menu-item has-submenu
                {{ $route == 'setting.index' ? 'active' : '' }}
                {{ $route == 'shipping.index' ? 'active' : '' }}
                {{ $route == 'shipping.create' ? 'active' : '' }}
                {{ $route == 'shipping.edit' ? 'active' : '' }}
                ">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a class="{{ $route == 'setting.index' ? 'active' : '' }}"
                            href="{{ route('setting.index') }}">Home</a>
                        {{-- {{-- <a class="{{ ($route == 'setting.activation') ? 'active':'' }}" href="{{ route('setting.activation') }}">Activation</a> --}}
                        <a class="{{ $route == 'shipping.index' || $route == 'shipping.create' || $route == 'shipping.edit' ? 'active' : '' }}"
                            href="{{ route('shipping.index') }}">Shipping Methods</a>
                        {{-- <a class="{{ ($route == 'paymentMethod.config') ? 'active':'' }}" href="{{ route('paymentMethod.config') }}">Payment Methods</a> --}}
                    </div>
                </li>
            </ul>
        @endif


        {{-- <br />
        <br /> --}}
        {{-- <div class="sidebar-widgets">
           <div class="copyright text-center m-25">
              <p>
                 <strong class="d-block">Admin Dashboard</strong> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved
              </p>
           </div>
        </div> --}}
    </nav>
</aside>
<style>
    /* Sidebar Background */
    .navbar-aside {
        background-color: #1E2A38 !important;
        /* darker background */
        color: #ffffff;
    }

    /* Brand/Logo Styling */
    .brand-wrap img {
        max-height: 35px;
    }

    /* Collapse button */
    .btn-aside-minimize {
        background-color: transparent;
        border: none;
        color: #ffffff;
    }

    /* Sidebar Menu Items */
    .menu-link {
        color: #d1d5db;
        /* light gray text */
        padding: 12px 20px;
        display: flex;
        align-items: center;
        border-radius: 8px;
        transition: background-color 0.2s ease;
    }

    .menu-link:hover,
    .menu-item.active>.menu-link {
        background-color: #2C3E50;
        color: #ffffff;
    }

    .menu-link i {
        margin-right: 10px;
        font-size: 16px;
        color: #9ca3af;
        /* neutral gray */
    }

    .menu-link:hover i,
    .menu-item.active .menu-link i {
        color: #ffffff;
    }

    /* Submenu Container */
    .submenu {
        background-color: #2C3E50;
        padding-left: 30px;
        border-left: 2px solid #3B82F6;
        margin: 0 0 10px 0;
    }

    .submenu a {
        color: #cbd5e1;
        padding: 8px 0;
        display: block;
        transition: color 0.2s ease;
    }

    .submenu a:hover,
    .submenu a.active {
        color: #ffffff;
    }

    /* FontAwesome custom icon class (optional refinements) */
    .fontawesome_icon_custom {
        font-size: 16px;
        color: inherit;
    }

    /* Scrollbar (optional for long menus) */
    .navbar-aside::-webkit-scrollbar {
        width: 6px;
    }

    .navbar-aside::-webkit-scrollbar-thumb {
        background: #3B3B3B;
        border-radius: 10px;
    }

    .navbar-aside::-webkit-scrollbar-track {
        background: #2C3E50;
    }
</style>
