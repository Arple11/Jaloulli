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
                <form role="form" method="post" action="{{route('store_user')}}">
                    @csrf
                    {{-- TODO adding a requerd * to requered fileds --}}
                    {{--@if ($errors->any())
                        <div class="alert alert-danger" dir="ltr">
                            <ul dir="ltr">
                                @foreach ($errors->all() as $error)
                                    <li dir="ltr">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif--}}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="email">ایمیل</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                    placeholder="ایمیل را وارد کنید">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="first_name">نام</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="نام">
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="نام خانوادگی">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="user_name">نام کاربری</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name"
                                    placeholder="نام کاربری">
                                    @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="phone_number">شماره همراه</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="09123456789">
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="age">سن</label>
                                    <input type="number" class="form-control" id="age" name="age"
                                    min="0" placeholder="سن را وارد کنید">
                                    @error('age')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                    <select class="form-control" id="education" name="education">
                                        <option value="high_school" selected>دیپلم</option>
                                        <option value="bachelor">کارشناسی</option>
                                        <option value="master">کارشناسی ارشد</option>
                                        <option value="doctorate">دکتری</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="postal_code">کد پستی</label>
                                    <input type="number" class="form-control" id="postal_code" name="postal_code"
                                    placeholder="کد پستی را وارد کنید">
                                    @error('postal_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="occupation">شغل</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation"
                                           placeholder="شغل را وارد کنید">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="interests">علایق</label>
                                    <textarea class="form-control" id="interests" name="interests"
                                              placeholder="علایق خود را وارد کنید"></textarea>
                                </div>

                                <div class="col">
                                    <label for="hobbies">سرگرمی‌ها</label>
                                    <textarea class="form-control" id="hobbies" name="hobbies"
                                              placeholder="سرگرمی‌های خود را وارد کنید"></textarea>
                                </div>
                                <div class="col">
                                    <label for="bio">درباره‌ی خود</label>
                                    <textarea class="form-control" id="bio" name="bio"
                                              placeholder="درباره‌ی خودتان بنویسید"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="آدرس را وارد کنید">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="password">پسورد</label>
                                    <input class="form-control @error('password') is-invalid @enderror" id="password"
                                           name="password" type="password"
                                           pattern="^\S{6,}$"
                                           placeholder="Password">

                                </div>
                                <div class="col">
                                    <label for="password_confirmation">تکرار پسورد</label>
                                    <input class="form-control" id="password_confirmation" name="password_confirmation"
                                           type="password"
                                           pattern="^\S{6,}$"
                                           placeholder="Verify Password">
                                </div>
                            </div>
                            <br>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">سطح دسترسی</label>
                            <select class="form-control" id="role" name="role">
                                <option value="1" selected>مشتری</option>
                                <option value="2">فروشنده</option>
                                <option value="3">ادمین</option>
                            </select>
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

<!-- /.content-wrapper -->

@include('.footer.main_footer')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- ./wrapper -->
@include('.scripts')
</body>

</html>
