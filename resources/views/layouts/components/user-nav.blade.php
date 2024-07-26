<div class="page-wrapper-img">
    <div class="page-wrapper-img-inner">
        <div class="sidebar-user media">
            <div class="avatar-box thumb-lg align-self-center mr-2 mb-1">
                <span class="avatar-title rounded-circle" id="user-initials"></span>
            </div>
            <div class="media-body align-item-center">
                <h5 id="user-name">{{ Auth::user()->name ?? '' }}</h5>
                <ul class="list-unstyled list-inline mb-0 mt-2">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class=""><i class="mdi mdi-account"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class=""><i class="mdi mdi-settings"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right align-item-center mt-2">
                        <a class="btn btn-primary px-4 align-self-center report-btn" href="{{ route('register') }}">Create Tenant</a>
                    </div>

                </div><!--end page title box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
    </div><!--end page-wrapper-img-inner-->
</div><!--end page-wrapper-img-->