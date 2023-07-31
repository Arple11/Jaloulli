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
        @include('header.adding.addOpportunity_header')
        <!-- /.content-header -->
        <!-- Main row -->
        <section class="content">
            <!-- form start -->
            <div class="container-fluid">
                <form role="form" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">آدرس ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="ایمیل را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="phoneNum">شماره تلفن</label>
                            <input type="text" class="form-control" id="phoneNum" name="phoneNum"
                                   placeholder="شماره تلفن">
                        </div>
                        <div class="form-group">
                            <label for="explanation">توضیحات</label>
                            <textarea class="form-control" rows="4" id="explanation" name="explanation"
                                      placeholder="لطفا توضیحات مربوطه را وارد کنید"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">ارسال فایل</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب
                                        فایل</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">


                            <label class="mcui-checkbox">
                                <input type="checkbox" id="op_urgent" name="op_urgent">
                                <div>
                                    <svg class="mcui-check" viewBox="-2 -2 35 35" aria-hidden="true">
                                        <polyline points="7.57 15.87 12.62 21.07 23.43 9.93"/>
                                    </svg>
                                </div>
                                <div class="form-check-label" for="op_urgent">&nbsp;&nbsp;فوری</div>
                            </label>
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
