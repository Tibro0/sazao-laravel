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
                <span>Orders</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.order.index', 'admin.order.show']) }}"><a
                        href="{{ route('admin.order.index') }}">All Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.pending-orders']) }}"><a
                        href="{{ route('admin.pending-orders') }}">All Pending Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.processed-orders']) }}"><a
                        href="{{ route('admin.processed-orders') }}">All Processed Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.dropped-off-orders']) }}"><a
                        href="{{ route('admin.dropped-off-orders') }}">All Dropped Off Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.shipped-orders']) }}"><a
                        href="{{ route('admin.shipped-orders') }}">All Shipped Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.out-for-delivery-orders']) }}"><a
                        href="{{ route('admin.out-for-delivery-orders') }}">All Out For Delivery Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.delivered-orders']) }}"><a
                        href="{{ route('admin.delivered-orders') }}">All Delivered Orders</a></li>
                <li class="{{ adminSidebarActive(['admin.canceled-orders']) }}"><a
                        href="{{ route('admin.canceled-orders') }}">All Canceled Orders</a></li>
            </ul>
        </li>

        <li class="{{ adminSidebarActive(['admin.transaction']) }}">
            <a href="{{ route('admin.transaction') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Transaction</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Manage Products</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.brand.*']) }}"><a
                        href="{{ route('admin.brand.index') }}">Brand</a></li>
                <li
                    class="{{ adminSidebarActive(['admin.products.*', 'admin.products-image-gallery.*', 'admin.products-variant.*', 'admin.products-variant-item.*']) }}">
                    <a href="{{ route('admin.products.index') }}">Products</a>
                </li>
                <li class="{{ adminSidebarActive(['admin.seller-products.index']) }}"><a
                        href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                <li class="{{ adminSidebarActive(['admin.seller-pending-products.index']) }}"><a
                        href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>E-commerce</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.flash-sale.*']) }}"><a
                        href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                <li class="{{ adminSidebarActive(['admin.coupons.*']) }}"><a
                        href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                <li class="{{ adminSidebarActive(['admin.shipping-rule.*']) }}"><a
                        href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>
                <li class="{{ adminSidebarActive(['admin.vendor-profile.*']) }}"><a
                        href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
                <li class="{{ adminSidebarActive(['admin.payment-settings.index']) }}"><a
                        href="{{ route('admin.payment-settings.index') }}">Payment Settings</a></li>
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
                <li class="{{ adminSidebarActive(['admin.home-page-setting']) }}"><a
                        href="{{ route('admin.home-page-setting') }}">Home Page Setting</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Footer</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li class="{{ adminSidebarActive(['admin.footer-info.index']) }}"><a
                        href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                <li class="{{ adminSidebarActive(['admin.footer-socials.*']) }}"><a
                        href="{{ route('admin.footer-socials.index') }}">Footer Socials</a></li>
                <li class="{{ adminSidebarActive(['admin.footer-grid-two.*']) }}"><a
                        href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>
                <li class="{{ adminSidebarActive(['admin.footer-grid-three.*']) }}"><a
                        href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a></li>
            </ul>
        </li>

        <li class="{{ adminSidebarActive(['admin.subscribers.*']) }}">
            <a href="{{ route('admin.subscribers.index') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Subscribers</span>
            </a>
        </li>

        <li class="{{ adminSidebarActive(['admin.settings.*']) }}">
            <a href="{{ route('admin.settings.index') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Settings</span>
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
