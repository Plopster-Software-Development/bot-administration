<div class="page-wrapper-inner">
    <div class="navbar-custom-menu">

        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu list-unstyled">

                    <li class="has-submenu">
                        <a href="#">
                            <i class="mdi mdi-account-multiple-outline"></i>
                            Tenants
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('tenant-register')}}">Create Tenant</a></li>
                            <li><a href="index-2.html">List Tenants</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#">
                            <i class="mdi mdi-account-outline"></i>
                            Users
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('user-register')}}">Create User</a></li>
                            <li><a href="index-2.html">List Users</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end navigation -->
        </div> <!-- end container-fluid -->
    </div>
</div>