<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | کاربر جدید</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styleSheets.styleSheets')
    <link rel="stylesheet" href="{{asset('persenalCss/app.css')}}">
</head>
<?php
$user = (object) [
    'user_name' => 'arcan5331',
    'first_name' => 'ali',
    'last_name' => 'Ghaforian',
    'phone_number' => '09382580898',
    'email' => 'alighaforian@yahoo.com',
]


?>
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
        @include('header.prof.editProfile_header')
        <!-- /.content-header -->
        <!-- Main row -->
        <section class="content">
            <!-- form start -->
            <div class="container-fluid">
                <form role="form" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   placeholder="{{$user->first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   placeholder="{{$user->last_name}}">
                        </div>
                        <div class="form-group">
                            <label for="user_name">نام کاربری</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                   placeholder="{{$user->user_name}}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">شماره همراه</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                   placeholder="{{$user->phone_number}}">
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
