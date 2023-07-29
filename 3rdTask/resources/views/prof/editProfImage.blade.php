<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | تفییر پروفیل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styleSheets.styleSheets')
    <link rel="stylesheet" href="{{asset('persenalCss/app.css')}}">
</head>
<?php
$user = (object)[
    'user_name' => 'arcan5331',
    'first_name' => 'ali',
    'last_name' => 'Ghaforian',
    'phone_number' => '09382580898',
    'email' => 'alighaforian@yahoo.com',
    'profImage' => null,
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
                <form role="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Show user's old image -->
                        <div class="form-group">
                            <label for="oldImage">Old Profile Image</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->profImage ? asset($user->profImage) : asset('pics/Screenshot_20230503_121934.png') }}"
                                     alt="Old Profile Image" class="img-thumbnail mr-3"
                                     style="width: 100px; height: 100px;">
                            </div>
                        </div>

                        <!-- Box for user to upload a new image -->
                        <div class="form-group">
                            <label for="newImage">Upload New Profile Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="newImage" name="newImage"
                                       accept="image/*">
                                <label class="custom-file-label" for="newImage">Choose file</label>
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
