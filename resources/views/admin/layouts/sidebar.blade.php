<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        <li>
            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Categories</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.category.*']) }}"><a
                        href="{{ route('admin.category.index') }}">Category</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Website</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.slider.*']) }}"><a
                        href="{{ route('admin.slider.index') }}">Slider</a></li>
            </ul>
        </li>

        {{-- <li>
            <a href="#" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li> --}}

        {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Email</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="email-inbox.html">Inbox</a></li>
                <li><a href="email-read.html">Read Email</a></li>
            </ul>
        </li> --}}

    </ul>
</div>
