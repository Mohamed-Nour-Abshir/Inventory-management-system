 @php
    use App\Models\Companaysetting;

     $user = Auth::guard('web')->user();
    $companysetting = Companaysetting::first();
 @endphp
    <div class="iq-sidebar sidebar-default">
        <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="header-logo">
                <img src="{{ asset('logo/nitmaglogo.png')}}" alt="logo"><h5 class="logo-title light-logo ml-3">NITMAG</h5>
                {{-- <img src="{{ asset('logo') . '/' . $companysetting->company_logo }}" alt="logo"><h5 class="logo-title light-logo ml-3">INVENTORY</h5> --}}
            </a>
            <div class="iq-menu-bt-sidebar ml-0">
                <i class="las la-bars wrapper-menu"></i>
            </div>
        </div>
        <div class="data-scrollbar" data-scroll="1">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="active">
                        <a href="{{ route('home') }}" class="svg-icon">
                            <svg  class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="ml-4">Dashboards</span>
                        </a>
                    </li>
                    @if ($user->can('Role Create') || $user->can('Role List') ||  $user->can('Role Edit') ||  $user->can('Role Delete') ||  $user->can('User List') ||  $user->can('User Create') ||  $user->can('User Edit') ||  $user->can('User Delete'))
                        <li class="">
                            <a href="#users" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="ml-4"> Manage Users</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="users" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @if($user->can('Role Create'))
                                <li class="">
                                    <a href="{{ route('role-permission.create') }}">
                                        <i class="las la-minus"></i><span>Create Role</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('Role List'))
                                <li class="">
                                    <a href="{{ route('role-permission.index') }}">
                                        <i class="las la-minus"></i><span>Role List</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('User Create'))
                                <li class="">
                                    <a href="{{ route('user-create.create') }}">
                                        <i class="las la-minus"></i><span>Create User</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('User List'))
                                <li class="">
                                    <a href="{{ route('user-create.index') }}">
                                        <i class="las la-minus"></i><span>User List</span>
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Customer List') || $user->can('Customer Create') || $user->can('Customer Edit') || $user->can('Customer Delete'))
                        <li class="">
                            <a href="#customer" class="collapsed icon" data-toggle="collapse" aria-expanded="false" data-icon="a">
                                <i class="fa fa-user-circle" aria-hidden="true"></i> <span class="ml-4">Manage Customer</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="customer" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Customer List'))
                                    <li class="">
                                            <a href="{{ route('customer.index') }}">
                                                <i class="las la-minus"></i><span>Customer List</span>
                                            </a>
                                    </li>
                                @endif
                                @if($user->can('Customer Create'))
                                    <li class="">
                                            <a href="{{ route('customer.create') }}">
                                                <i class="las la-minus"></i><span>Add Customer</span>
                                            </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Supplier List') || $user->can('Supplier Create') || $user->can('Supplier Edit') || $user->can('Supplier Delete'))
                        <li class="">
                            <a href="#supplier" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-truck" aria-hidden="true"></i> <span class="ml-4">Manage Supplier</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="supplier" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Supplier List'))
                                    <li class="">
                                            <a href="{{ route('supplier.index') }}">
                                                <i class="las la-minus"></i><span>Supplier List</span>
                                            </a>
                                    </li>
                                @endif
                                @if($user->can('Supplier Create'))
                                    <li class="">
                                        <a href="{{ route('supplier.create') }}">
                                            <i class="las la-minus"></i><span>Add Supplier</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Purchase List') || $user->can('Purchase Create') || $user->can('Purchase Edit') || $user->can('Purchase Delete'))
                        <li class="">
                            <a href="#purchase" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="ml-4">Purchases</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="purchase" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @if($user->can('Purchase List'))
                                <li class="">
                                    <a href="{{ route('purchase.index') }}">
                                        <i class="las la-minus"></i><span>List Purchases</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('Purchase Create'))
                                <li class="">
                                    <a href="{{ route('purchase.create') }}">
                                        <i class="las la-minus"></i><span>Add purchase</span>
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Category List') || $user->can('Category Create') || $user->can('Category Edit') || $user->can('Category Delete') || $user->can('Brand List') || $user->can('Brand Create') || $user->can('Brand Edit') || $user->can('Brand Delete') || $user->can('Unit List') || $user->can('Unit Create') || $user->can('Unit Edit') || $user->can('Unit Delete') || $user->can('Warehouse List') || $user->can('Warehouse Create') || $user->can('Warehouse Edit') || $user->can('Warehouse Delete') || $user->can('Product List') || $user->can('Product Create') || $user->can('Product Edit') || $user->can('Product Delete'))
                        <li class="">
                            <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fab fa-product-hunt"></i> <span class="ml-4">Product</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Category List'))
                                <li class="">
                                    <a href="{{ route('category.index') }}">
                                        <i class="las la-minus"></i><span>Manage Category</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Brand List'))
                                <li class="">
                                    <a href="{{ route('brand.index') }}">
                                        <i class="las la-minus"></i><span>Manage Brand</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Unit List'))
                                <li class="">
                                    <a href="{{ route('unit.index') }}">
                                        <i class="las la-minus"></i><span>Manage Unit</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Warehouse List'))
                                <li class="">
                                    <a href="{{ route('warehouse.index') }}">
                                        <i class="las la-minus"></i><span>Manage Warehouse</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Product List'))
                                <li class="">
                                    <a href="{{ route('product.index') }}">
                                        <i class="las la-minus"></i><span>Product List</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Product Create'))
                                <li class="">
                                    <a href="{{ route('product.create') }}">
                                        <i class="las la-minus"></i><span>Add Product</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Order List') || $user->can('Order Create') || $user->can('Order Edit') || $user->can('Order Delete'))
                        <li class="">
                            <a href="#sale" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="ml-4">Sales</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="sale" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Order Create'))
                                    <li class="">
                                        <a href="{{ route('order.create') }}">
                                            <i class="las la-minus"></i><span>New Sale</span>
                                        </a>
                                    </li>
                                @endif
                                @if($user->can('Order List'))
                                    <li class="">
                                        <a href="{{ route("order.index") }}">
                                            <i class="las la-minus"></i><span>Sales List</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Purchase Return List') || $user->can('Purchase Return Create') || $user->can('Purchase Return Edit') || $user->can('Purchase Return Delete') || $user->can('Order Return List') || $user->can('Order Return Create') || $user->can('Order Return Edit') || $user->can('Order Return Delete'))
                        <li class="">
                            <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-exchange-alt"></i> <span class="ml-4">Returns</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="return" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Purchase Return List'))
                                    <li class="">
                                        <a href="{{ route('purchase-return.index') }}">
                                            <i class="las la-minus"></i><span>Purchase Return Lists</span>
                                        </a>
                                    </li>
                                @endif
                                @if($user->can('Purchase Return Create'))
                                    <li class="">
                                        <a href="{{ route('purchase-return.create') }}">
                                            <i class="las la-minus"></i><span>Add Purchase Return</span>
                                        </a>
                                    </li>
                                @endif
                                @if($user->can('Order Return List'))
                                    <li class="">
                                        <a href="{{ route('sales-return.index') }}">
                                            <i class="las la-minus"></i><span>Sales Return List</span>
                                        </a>
                                    </li>
                                @endif
                                @if($user->can('Order Return Create'))
                                    <li class="">
                                        <a href="{{ route('sales-return.create') }}">
                                            <i class="las la-minus"></i><span>Add Sales Return</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Sales Report') || $user->can('Purchase Report'))
                        <li class="">
                            <a href="#reports" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-flag" aria-hidden="true"></i> <span class="ml-4">Reports</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Purchase Report'))
                                    <li class="">
                                        <a href="{{ route('purchase-report') }}">
                                            <i class="las la-minus"></i><span>Purchase Report</span>
                                        </a>
                                    </li>
                                @endif
                                @if($user->can('Sales Report'))
                                    <li class="">
                                        <a href="{{ route('sales-report') }}">
                                            <i class="las la-minus"></i><span>Sales Report</span>
                                        </a>
                                    </li>
                                @endif
                                    <li class="">
                                        <a href="{{ route('inventory-report') }}">
                                            <i class="las la-minus"></i><span>Inventory Report</span>
                                        </a>
                                    </li>
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Expense List') || $user->can('Expense Create') || $user->can('Expense Edit') || $user->can('Expense Delete'))
                        <li class="">
                            <a href="#expense" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-calculator" aria-hidden="true"></i> <span class="ml-4">Expense</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="expense" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Expense List'))
                                    <li class="">
                                        <a href="{{ route('expense.index') }}">
                                            <i class="las la-minus"></i><span>List Expense</span>
                                        </a>
                                    </li>
                                @endif
                                @if($user->can('Expense Create'))
                                    <li class="">
                                        <a href="{{ route('expense.create') }}">
                                            <i class="las la-minus"></i><span>Add Expense</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Customer Email List') || $user->can('Customer Email Send') || $user->can('Customer Email Delete') || $user->can('Supplier Email List') || $user->can('Supplier Email Send') || $user->can('Supplier Email Delete'))
                        <li class="">
                            <a href="#email" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <span class="ml-4">Email Send</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="email" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @if($user->can('Customer Email Send'))
                                <li class="">
                                    <a href="{{ route('customer-email.create') }}">
                                        <i class="las la-minus"></i><span>Send Customer</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('Customer Email List'))
                                <li class="">
                                    <a href="{{ route('customer-email.index') }}">
                                        <i class="las la-minus"></i><span>Customer Email List</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('Supplier Email Send'))
                                <li class="">
                                    <a href="{{ route('supplier-email.create') }}">
                                        <i class="las la-minus"></i><span>Send Supplier</span>
                                    </a>
                                </li>
                            @endif
                            @if($user->can('Supplier Email List'))
                                <li class="">
                                    <a href="{{ route('supplier-email.index') }}">
                                        <i class="las la-minus"></i><span>Supplier Email List</span>
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Company Settings Information') || $user->can('Company Settings Edit') || $user->can('Company Settings Delete'))
                        <li class="">
                            <a href="#setting" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i> <span class="ml-4">Settings</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="setting" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Company Settings Information'))
                                    <li class="">
                                    <a href="{{ route('company-setting.index') }}">
                                        <i class="las la-minus"></i><span>Company Setting</span>
                                    </a>
                                    </li>
                                @endif
                                    {{-- <li class="">
                                    <a href="{{ route('expense.create') }}">
                                        <i class="las la-minus"></i><span>Software Setting</span>
                                    </a>
                                    </li> --}}
                            </ul>
                        </li>
                    @endif
                    @if($user->can('Account List') || $user->can('Account Create') || $user->can('Account Edit') || $user->can('Account Delete') || $user->can('Fundtransfer List') || $user->can('Fundtransfer Create') || $user->can('Fundtransfer Delete'))
                        <li class="">
                            <a href="#account" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-address-card" aria-hidden="true"></i> <span class="ml-4">General Account</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="account" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @if($user->can('Account List'))
                                <li class="">
                                    <a href="{{ route('accounts.index') }}">
                                        <i class="las la-minus"></i><span>Account List</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Account Create'))
                                <li class="">
                                    <a href="{{ route('accounts.create') }}">
                                        <i class="las la-minus"></i><span>Account Create</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Fundtransfer List'))
                                <li class="">
                                    <a href="{{ route('fundtransfer.index') }}">
                                        <i class="las la-minus"></i><span>Fundtransfer List</span>
                                    </a>
                                </li>
                                @endif
                                @if($user->can('Fundtransfer Create'))
                                <li class="">
                                    <a href="{{ route('fundtransfer.create') }}">
                                        <i class="las la-minus"></i><span>Fundtransfer</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
            <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                <div class="card border-none">
                    <div class="card-body p-0">
                        <div class="sidebarbottom-content">
                            <div class="image"><img src="{{ asset('assets/images/background/footer.png') }}" class="img-fluid" alt="side-bkg"></div>
                            <h6 class="mt-4 px-4 body-title">Nitmag</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3"></div>
        </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="{{ route('home') }}" class="header-logo">
                            <img src="{{ asset('logo/nitmaglogo.png') }}" class="img-fluid rounded-normal" alt="logo">
                            <h5 class="logo-title ml-3">Nitmag</h5>
                        </a>
                    </div>
                    <div class="iq-search-bar device-search">
                        {{-- <h3><i>{{ $companysetting->company_name }}</i></h3> --}}
                        {{-- <h3><i>Kaizen It Ltd</i></h3> --}}
                    </div>
                    <div class="d-flex align-items-center">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                @if($user->can('Order Create'))
                                    <li>
                                        <a href="{{ route('order.create') }}" class="btn border add-btn shadow-none mx-2 d-none d-md-block">
                                        <i class="las la-plus mr-2"></i>New Sale</a>
                                    </li>
                                @endif
                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                    placeholder="type here to search...">
                                                <a href="#" class="search-link"><i class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('profile-image') . '/' . Auth::user()->image }}" class="img-fluid rounded" alt="user">
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 text-center">
                                                <div class="media-body profile-detail text-center">
                                                    <img src="{{ asset('assets/images/page-img/profile-bg.jpg') }}" alt="profile-bg"
                                                        class="rounded-top img-fluid mb-4">
                                                    <img src="{{ asset('profile-image') . '/' . Auth::user()->image }}" alt="profile-img"
                                                        class="rounded profile-img img-fluid avatar-70">
                                                </div>
                                                <div class="p-3">
                                                    <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                                    <p class="mb-0">{{ Auth::user()->designation }}</p>
                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <a href="{{ route('profile.index') }}" class="btn border mr-2">Profile</a>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn border">Sign Out</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
