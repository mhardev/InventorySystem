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
            <a href="{{url('client/homepage')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Homepage">Homepage</div>
            </a>
        </li>
        <li class="menu-item @yield('suggestitem_select')">
            <a href="{{url('client/user-items')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-dashboard"></i>
            <div data-i18n="Suggested Items">User Items</div>
            </a>
        </li>

        <!-- Layouts -->

            <!-- Settings -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <li class="menu-item @yield('itemproduct_select')">
            <a href="{{url('client/item-products')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-package"></i>
            <div data-i18n="Items">Products</div>
            </a>
        </li>
        <li class="menu-item @yield('itemrequest_select')">
            <a href="{{url('client/item-requests')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
            <div data-i18n="Requests">Requested Items</div>
            </a>
        </li>
        <li class="menu-item @yield('userhistory_select')">
            <a href="{{url('client/user-history')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-receipt"></i>
            <div data-i18n="History">History</div>
            </a>
        </li>
        <li class="menu-item @yield('usernotif_select')">
            <a href="{{url('client/user-notifications')}}" class="menu-link">
            <i class="menu-icon bx bx-bell me-2"></i>
            <div data-i18n="Notifications">Notifications</div>
            </a>
        </li>
        <!--
        <li class="menu-item">
            <a type="button" class="menu-link menu-toggle noselect">
                <i class="menu-icon tf-icons bx bxs-truck"></i>
                <div data-i18n="Category">Supplier</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="MainCategory">Supplier Info</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="MainCategory">Supplier Products</div>
                    </a>
                </li>
            </ul>
        </li> -->
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

    </ul>

    <!-- Client Profile -->
    <div class="menu-header small text-uppercase py-1"><span class="menu-header-text">Profile Settings</span></div>
    <ul class="menu-inner py-1 mb-2 h-auto">
        <!-- Admin Settings Dropdown -->
        <li class="menu-item @yield('userprofile_select')">
            <a href="{{url('client/user-profile')}}" class="menu-link" wire:>
                <i class="bx bx-user me-2"></i>
                <div data-i18n="ClientProfile">User Profile</div>
            </a>
        </li>
    </ul>
  </aside>
