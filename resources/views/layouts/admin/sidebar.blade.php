<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('admin/dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('public/assets/img/logo/512x512.png') }}" alt="chedis" style="width:  50px; height: auto;">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-3" style="text-align: center;">
                <span style="font-size: 1.1em;">Supply</span><br>
                <span style="font-size: 0.5em;">Inventory System</span>
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none" style="width: 57.09px; padding-left:4%;">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mb-auto">
      <!-- Dashboards -->
        <!--<li class="menu-header small text-uppercase">
            <span class="menu-header-text">Home</span>
        </li>-->
        <li class="menu-item @yield('dashboard_select')">
            <a href="{{url('admin/dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <li class="menu-item @yield('requestreport_select')">
            <a href="{{url('admin/request-reports')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-report"></i>
            <div data-i18n="Dashboards">Issued Items</div>
            </a>
        </li>

        <!-- Layouts -->

        <!-- Settings -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>

        <li class="menu-item @yield('itemproduct_select')">
            <a href="{{url('admin/item-products')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Items">Products</div>
            </a>
        </li>

        <li class="menu-item @yield('itemrequest_select')">
            <a href="{{url('admin/item-requests')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-il8n="Requests">Requested Items</div>
            </a>
        </li>

        <li class="menu-item @yield('surrenderitem_select')">
            <a href="{{url('admin/surrender-items')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-flag-alt"></i>
                <div data-il8n="Surrender">Surrendered Items</div>
            </a>
        </li>
        <!-- Main Categories Dropdown -->
        <li class="menu-item @yield('category_select') @yield('maincategory_select') @yield('subcategory_select')">
            <a type="button" class="menu-link menu-toggle noselect">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Category">Item Categories</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @yield('maincategory_select')">
                    <a href="{{url('admin/item-categories')}}" class="menu-link">
                        <div data-i18n="MainCategory">Main Categories</div>
                    </a>
                </li>
                <li class="menu-item @yield('subcategory_select')">
                    <a href="{{url('admin/sub-categories')}}" class="menu-link">
                        <div data-i18n="SubCategory">Sub Categories</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item @yield('itembrand_select')">
            <a href="{{url('admin/item-brands')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="ItemBrands">Item Brands</div>
            </a>
        </li>

        <li class="menu-item @yield('supplier_select')">
            <a href="{{url('admin/suppliers')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-truck"></i>
                <div data-i18n="Supplier">Supplier</div>
            </a>
        </li>

        <li class="menu-item @yield('useracc_select')">
            <a href="{{url('admin/users')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="UserAccounts">User Accounts</div>
            </a>
        </li>
        <!--<div>
        <-- Reports and Transactions -->
        <!--Reports -->
        <!--<li class="menu-header small text-uppercase"><span class="menu-header-text">Reports</span></li>-->
        <!-- Item Request -->
        <!--<li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="ItemRequestReports">Item Request Reports</div>
            </a>
        </li>-->
        <!-- Item Received -->
        <!--<li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="ItemReceivedReports">Item Received Reports</div>
            </a>
        </li>-->
        <!-- Transactions -->
        <!--<li class="menu-header small text-uppercase"><span class="menu-header-text">Transactions</span></li>-->
        <!-- Item Request -->
        <!--<li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="ItemRequest">Item Request</div>
            </a>
        </!li>-->
        <!-- Item Received -->
        <!--<li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="ItemReceived">Item Received</div>
            </a>
        </li>-->

            <!-- Admin Settings -->
        <!--<li class="menu-header small text-uppercase"><span class="menu-header-text">Settings and Other Modules</span></li>
        <li class="menu-item">
            <a type="button" class="menu-link menu-toggle noselect">
            <i class="menu-icon tf-icons bx bx-user-circle"></i>
            <div data-i18n="AccountSettings">Account Settings</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                <div data-i18n="Account">Account</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="pages-account-settings-notifications.html" class="menu-link">
                <div data-i18n="Notifications">Notifications</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="pages-account-settings-connections.html" class="menu-link">
                <div data-i18n="Connections">Connections</div>
                </a>
            </li>
            </ul>
        </li>-->
        <!--<li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
            <div data-i18n="Authentications">Authentications</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item">
                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                <div data-i18n="Basic">Login</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                <div data-i18n="Basic">Register</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                <div data-i18n="Basic">Forgot Password</div>
                </a>
            </li>
            </ul>
        </li>-->
        <!-- Archive -->
        <!--<li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-box"></i>
            <div data-i18n="Archive">Archive</div>
            </a>
        </li>
        </div>-->
        <!-- Audit Trails -->
        <li class="menu-item @yield('audittrail_select')">
            <a href="{{url('admin/audit-trails')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file-find"></i>
                <div data-i18n="AuditTrails">Audit Trails</div>
            </a>
        </li>
    </ul>
    <!-- Logout -->
    <div class="menu-header small text-uppercase py-1"><span class="menu-header-text">Profile Settings</span></div>
    <ul class="menu-inner py-1 mb-2 h-auto">
        <!-- Admin Settings Dropdown -->
        <li class="menu-item @yield('adminprofile_select')">
            <a href="{{url('admin/admin-profile')}}" class="menu-link" wire:>
                <i class="menu-icon tf-icons bx bx-user me-2"></i>
                <div data-i18n="AdminProfile">Admin Profile</div>
            </a>
        </li>
    </ul>
  </aside>
