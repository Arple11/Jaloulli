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
        @include('header.adding.addUser_header')
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
                            <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="نام">
                        </div>
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="نام خانوادگی">
                        </div>
                        <div class="form-group">
                            <label for="user_name">نام کاربری</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="نام کاربری">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">شماره همراه</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="9120000000">
                        </div>

                        <!-- Add the remaining input fields -->
                        <div class="form-group">
                            <label for="age">سن</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="سن را وارد کنید">
                        </div>

                        <div class="form-group">
                            <label for="gender">جنسیت</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male">مرد</option>
                                <option value="female">زن</option>
                                <option value="other">سایر</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="education">تحصیلات</label>
                            <select class="form-control" id="education" name="education">
                                <option value="high_school">دیپلم</option>
                                <option value="bachelor">کارشناسی</option>
                                <option value="master">کارشناسی ارشد</option>
                                <option value="doctorate">دکتری</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="occupation">شغل</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="شغل را وارد کنید">
                        </div>

                        <div class="form-group">
                            <label for="interests">علایق</label>
                            <textarea class="form-control" id="interests" name="interests" placeholder="علایق خود را وارد کنید"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="hobbies">سرگرمی‌ها</label>
                            <textarea class="form-control" id="hobbies" name="hobbies" placeholder="سرگرمی‌های خود را وارد کنید"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="bio">درباره‌ی خود</label>
                            <textarea class="form-control" id="bio" name="bio" placeholder="درباره‌ی خودتان بنویسید"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="postal_code">کد پستی</label>
                            <input type="number" class="form-control" id="postal_code" name="postal_code" placeholder="کد پستی را وارد کنید">
                        </div>

                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="آدرس را وارد کنید">
                        </div>

                        <div class="form-group">
                            <label for="password">پسورد</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="پسورد را وارد کنید">
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">تکرار پسورد</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="پسورد را دوباره وارد کنید">
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
