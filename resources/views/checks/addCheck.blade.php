<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styleSheets.styleSheets')
    <link rel="stylesheet" href="{{asset('persenalCss/app.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('navbar.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        @include('Sidebar.Sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        @include('header.adding.addCheck_header')
        <!-- /.content-header -->
        <!-- Main row -->
        <section class="content">
            <!-- form start -->
            <div class="container-fluid">
                <form role="form" method="post" action="{{route('submitCheck')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="checkNum">شماره فاکتور</label>
                            <input type="number" class="form-control" id="checkNum" name="checkNum"
                                   placeholder="شماره فاکتور را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="customerName">نام خانوادگی مشتری</label>
                            <input type="text" class="form-control" id="customerName" name="customerName"
                                   placeholder="نام خانوادگی مشتری">
                        </div>
                        <div class="form-group">
                            <label for="customerPhoneNum">شماره تلفن مشتری</label>
                            <input type="text" class="form-control" id="customerPhoneNum" name="customerPhoneNum"
                                   placeholder="شماره تلفن مشتری">
                        </div>
                        <div class="form-group">
                            <label for="totalPay">مبلغ فاکتور</label>
                            <input type="password" class="form-control" id="totalPay" name="totalPay"
                                   placeholder="مبلغ فاکتور را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="checkImage">ارسال فایل</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="checkImage" name="checkImage"
                                           accept="image/*,.pdf,.doc">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب اسکن
                                        فاکتور</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- /.card -->


    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
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
@include('.scripts')
</body>

</html>
