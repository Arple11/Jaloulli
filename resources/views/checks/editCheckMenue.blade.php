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
{{--            @dd($check)--}}
            <?php
            $temp = $check->checkid;
//            dd($temp)
            ?>

            <div class="container-fluid">
                <form role="form" method="post" action="{{route('store_edited_check',['id' => $temp]) }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="order_number">شماره سفارش</label>
                            <input type="integer" class="form-control" id="order_number" name="order_number"
                                   placeholder="{{$check->order_number}}" value="{{$check->order_number}}">
                        </div>
                        <div class="form-group">
                            <label for="customer_id">id مشتری</label>
                            <input type="integer" class="form-control" id="customer_id" name="customer_id"
                                   placeholder="{{$check->customer_id}}" value="{{$check->customer_id}}">

                            <div class="form-group">
                                <label for="seller_id">id فروشنده </label>
                                <input type="integer" class="form-control" id="seller_id" name="seller_id"
                                       placeholder="{{$check->seller_id}}" value="{{$check->seller_id}}">

                            </div>
                            <div class="form-group">
                                <label for="total_pay">مبلغ فاکتور</label>
                                <input type="bigInteger" class="form-control" id="total_pay" name="total_pay"
                                       placeholder="{{$check->total_pay}}" value="{{$check->total_pay}}">
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
