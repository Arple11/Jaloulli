@include('.Sidebar.brand')
<div class="sidebar" style="direction: ltr">
    <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">حسام موسوی</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            داشبوردها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./workplace" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>داشبورد اول</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-regular fa-circle-user"></i>
                        <p>
                            کاربران
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{route('addUser')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p> کاربر جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="{{route('Users_data')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p>لیست کاربران </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-receipt"></i>
                        <p>
                            فاکتورها
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{route('addCheck')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p> فاکتور جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="{{route('Checks_data')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p>لیست فاکتورها </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-tags fa-flip-horizontal"></i>
                        <p>
                            محصولات
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addProduct')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p> محصول جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Products_data')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p>لیست محصولات </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-cart-arrow-down fa-flip-horizontal"></i>
                        <p>
                            سفارشات
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addOrder')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p> سفارش جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Orders_data')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p>لیست سفارشات </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-cash-register fa-flip-horizontal"></i>
                        <p>
                            فرصت های فروش
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addOpportunity')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p>ثبت فرصت جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Opportunitys_data')}}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrow-left"></i>
                                <p> لیست فرصتها </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</div>
