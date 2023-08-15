<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | جدول داده</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('.styleSheets.dataStyle')
    @include('.styleSheets.styleSheets')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('.navbar.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        @include('.Sidebar.Sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('.header.data.usersData_header')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="accordionHead">
                                <form  role="form" method="get" action="#">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <a class="btn btn-secondary" data-bs-toggle="collapse" href="#fillters">
                                                فیلتر ها
                                            </a>
                                        </div>
                                        <div class="collapse" id="fillters" data-bs-parent="#accordionHead">
                                            <div class="card-body">
                                                <div class="form-control">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="FilterEmail">ایمیل</label>
                                                                <input type="email" class="form-control"
                                                                       id="FilterEmail"
                                                                       name="FilterEmail"
                                                                       placeholder="email">
                                                            </div>
                                                            <div class="col">
                                                                <label for="first_name">نام</label>
                                                                <input type="text" class="form-control" id="first_name"
                                                                       name="first_name" placeholder="نام">
                                                            </div>
                                                            <div class="col">
                                                                <label for="last_name">نام خانوادگی</label>
                                                                <input type="text" class="form-control" id="last_name"
                                                                       name="last_name"
                                                                       placeholder="نام خانوادگی">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="user_name">نام کاربری</label>
                                                                <input type="text" class="form-control" id="user_name"
                                                                       name="user_name"
                                                                       placeholder="نام کاربری">
                                                            </div>
                                                            <div class="col">
                                                                <label for="phone_number">شماره همراه</label>
                                                                <input type="number" class="form-control"
                                                                       id="phone_number"
                                                                       name="phone_number"
                                                                       placeholder="9120000000">
                                                            </div>
                                                            <div class="col">
                                                                <div class="row">

                                                                    <div class="col">
                                                                        <label for="age">سن</label>
                                                                        <label for="ageMin" id="age">از</label>
                                                                        <input type="number" class="form-control"
                                                                               id="ageMin" name="ageMin"
                                                                               placeholder="از">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="ageMax">تا</label>
                                                                        <input type="number" class="form-control"
                                                                               id="ageMax" name="ageMax"
                                                                               placeholder="تا">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="gender">جنسیت</label>
                                                                <select class="form-control" id="gender" name="gender">
                                                                    <option value="male" selected>مرد</option>
                                                                    <option value="female">زن</option>
                                                                    <option value="other">سایر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="education">تحصیلات</label>
                                                                <select class="form-control" id="education"
                                                                        name="education">
                                                                    <option value="high_school" selected>دیپلم</option>
                                                                    <option value="bachelor">کارشناسی</option>
                                                                    <option value="master">کارشناسی ارشد</option>
                                                                    <option value="doctorate">دکتری</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="postal_code">کد پستی</label>
                                                                <input type="number" class="form-control"
                                                                       id="postal_code"
                                                                       name="postal_code"
                                                                       placeholder="کد پستی را وارد کنید">
                                                            </div>
                                                            <div class="col">
                                                                <label for="occupation">شغل</label>
                                                                <input type="text" class="form-control" id="occupation"
                                                                       name="occupation"
                                                                       placeholder="شغل را وارد کنید">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-control">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="orderStatus">سفارش</label>
                                                                <select class="form-control" id="orderStatus"
                                                                        name="orderStatus">
                                                                    <option value="true">دارد</option>
                                                                    <option value="false">ندارم</option>
                                                                    <option value="all" selected>همه</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="factorStatus">فاکتور</label>
                                                                <select class="form-control" id="factorStatus"
                                                                        name="factorStatus">
                                                                    <option value="true">دارد</option>
                                                                    <option value="false">ندارم</option>
                                                                    <option value="all" selected>همه</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="orderCount">تعداد سفارشات</label>
                                                                        <label for="orderCountMin"
                                                                               id="orderCount">از</label>
                                                                        <input type="number" class="form-control"
                                                                               id="orderCountMin" name="orderCountMin"
                                                                               placeholder="از">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="orderCountMax">تا</label>
                                                                        <input type="number" class="form-control"
                                                                               id="orderCountMax" name="orderCountMax"
                                                                               placeholder="تا">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="orderTotalPrice">قیمت کل
                                                                            سفارشات</label>
                                                                        <label for="orderTotalPriceMin"
                                                                               id="orderCount">از</label>
                                                                        <input type="number" class="form-control"
                                                                               id="orderTotalPriceMin"
                                                                               name="orderTotalPriceMin"
                                                                               placeholder="از">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="orderTotalPriceMax">تا</label>
                                                                        <input type="number" class="form-control"
                                                                               id="orderTotalPriceMax"
                                                                               name="orderTotalPriceMax"
                                                                               placeholder="تا">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-info">فیلتر</button>
                                                <a href="{{ route('Users_data') }}">
                                                    <button type="button" class="btn btn-warning">حذف فیلتر ها</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table id="Data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>نقش</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>شماره همراه</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->role->role_name }}</th>
                                        <td>{{ $user->user_name }}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>
                                            <form class="" action="{{route('edit_user',['id'=>$user->id])}}"
                                                  method="get">
                                                <button type="submit">
                                                    <i class="fa-regular fa-pen-to-square fa-flip-horizontal"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form class="" action="{{route('delete_user',['id'=>$user->id])}}"
                                                  method="post">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure?')">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نقش</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>شماره همراه</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('.footer.main_footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- page script -->

<script>
    $(function () {
        $('#Data').DataTable({
            "language":
                {
                    "paginate":
                        {
                            "next": "بعدی",
                            "previous": "قبلی"
                        },
                    "search": "جست و جو : ",
                },

            "info": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "autoWidth": true
        });
    });
</script>

</body>
</html>
