<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/home') }}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @if(Auth::user()->role == '0')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Thể loại sản phẩm
                    <i class="fas fa-angle-left right"></i>
{{--                    <span class="badge badge-info right">6</span>--}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('categories.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới thể loại sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách thể loại sản phẩm</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Loại sản phẩm
                    <i class="fas fa-angle-left right"></i>
{{--                    <span class="badge badge-info right">6</span>--}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('type-products.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới loại sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('type-products.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách loại sản phẩm</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Sản phẩm
                    <i class="fas fa-angle-left right"></i>
{{--                    <span class="badge badge-info right">6</span>--}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('products.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Slide
                    <i class="fas fa-angle-left right"></i>
{{--                    <span class="badge badge-info right">6</span>--}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('slides.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới ảnh slide</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slides.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách ảnh slide</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Người dùng
                    <i class="fas fa-angle-left right"></i>
{{--                    <span class="badge badge-info right">6</span>--}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới người dùng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách người dùng</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Quản lý đơn hàng
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('bill.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('don-hang-chua-xu-ly') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm chua xử lý</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('don-hang-chua-giao') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm chưa giao</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('don-hang-dang-giao') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm đang giao</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('don-hang-da-giao') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm đã giao</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('don-hang-da-huy') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sản phẩm bị hủy</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/charts/chartjs.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>ChartJS</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/charts/flot.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Flot</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/charts/inline.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inline</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Thống kê
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('thong-ke-doanh-thu') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thống kê doanh thu</p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Thống kê hàng tồn</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ url('thong-ke-don-hang-huy') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn hàng bị hủy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('thong-ke-don-hang') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thống kê số lượng đơn hàng</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Thông tin công ty
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('introduces.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Giới thiệu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dịch vụ</p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="pages/tables/jsgrid.html" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Hỗ trợ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="pages/tables/jsgrid.html" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Video</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="pages/tables/jsgrid.html" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Khuyến mãi</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ url('news') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tin tức</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contacts.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Liên hệ</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('feedback-user') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Góp ý</p>
                </a>
            </li>
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon far fa-envelope"></i>--}}
{{--                <p>--}}
{{--                    Mailbox--}}
{{--                    <i class="fas fa-angle-left right"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inbox</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Compose</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Read</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        @else
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon far fa-envelope"></i>--}}
{{--                <p>--}}
{{--                    Mailbox--}}
{{--                    <i class="fas fa-angle-left right"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/mailbox/mailbox.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inbox</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/mailbox/compose.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Compose</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/mailbox/read-mail.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Read</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        @endif
    </ul>
</nav>
<!-- /.sidebar-menu -->
