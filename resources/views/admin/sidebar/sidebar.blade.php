
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img src={{ asset('assets/images/image.png') }} width="20" alt="">
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b>{{ Auth::guard('admin')->user()->name }}</b></span>
                        <small class="text-end font-w400">({{ Auth::guard('admin')->user()->email }})</small>
                    </div>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-025-dashboard"></i>
                <span class="nav-text">Templates</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('admin.templates.create') }}">Create</a></li>
                <li><a href="{{ route('admin.templates.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span class="nav-text">Users</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('/admin/user/table') }}">User Management</a></li>
            </ul>
            </li>
        </ul>
    </div>
</div>
