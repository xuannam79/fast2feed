<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route('trangChuAdmin') }}">
                    <img src="/fast2feed/public/templates/admin/images/icon/f2f.png" alt="Fast2Feed"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ route('trangChuAdmin') }}">
                                <i class="fas fa-tachometer-alt"></i>Trang chủ</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-suitcase"></i>Quản lý</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('catAdmin') }}">
                                        <i class="fas fa-align-justify"></i>Danh mục</a>
                                </li>
                                <li>
                                    <a href="{{ route('menuAdmin') }}">
                                        <i class="fab fa-elementor"></i>Menu</a>
                                </li>
                                
                                <li>
                                    <a href="{{ route('customerAdmin') }}">
                                        <i class="fas fa-warehouse"></i>Customer</a>
                                </li>
                                <li>
                                    <a href="{{ route('productAdmin') }}">
                                        <i class="fas fa-utensils"></i>Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{ route('userAdmin') }}">
                                        <i class="fas fa-users"></i>Account</a>
                                </li>
                                <li>
                                    <a href="{{ route('userAdmin') }}">
                                        <i class="fas fa-motorcycle"></i>Shipper</a>
                                </li>
                                <li>
                                    <a href="{{ route('contactAdmin') }}">
                                        <i class="far fa-address-book"></i>Liên hệ</a>
                                </li>
                                <li>
                                    <a href="{{ route('commentAdmin') }}">
                                        <i class="fas fa-comments"></i>Bình luận</a>
                                </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside>
                <!-- END MENU SIDEBAR-->
