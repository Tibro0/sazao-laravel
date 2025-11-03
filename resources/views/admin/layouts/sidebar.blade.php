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
                <li class="{{ adminSidebarActive(['admin.sub-category.*']) }}"><a
                        href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                <li class="{{ adminSidebarActive(['admin.child-category.*']) }}"><a
                        href="{{ route('admin.child-category.index') }}">Child Category</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Products</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.brand.*']) }}"><a href="{{ route('admin.brand.index') }}">Brand</a></li>
                <li class="{{ adminSidebarActive(['admin.products.*', 'admin.products-image-gallery.*', 'admin.products-variant.*', 'admin.products-variant-item.*']) }}"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="{{ adminSidebarActive(['admin.seller-products.index']) }}"><a href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                <li class="{{ adminSidebarActive(['admin.seller-pending-products.index']) }}"><a href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>E-commerce</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.flash-sale.*']) }}"><a href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>

                <li class="{{ adminSidebarActive(['admin.vendor-profile.*']) }}"><a href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
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

        <li class="{{ adminSidebarActive(['admin.settings.*']) }}">
            <a href="{{ route('admin.settings.index') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>General Setting</span>
            </a>
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
