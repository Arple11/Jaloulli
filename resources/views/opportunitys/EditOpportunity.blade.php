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
                <form role="form" action="{{Route('store_opportunities')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">کد مشتری</label>
                            <input type="number" readonly class="form-control" id="id" name="customer_id"
                                   value={{$opportunity->customer_id}}>
                        </div>
                        <div class="form-group">
                            <label for="product_id">کد محصول</label>
                            <input type="number" readonly class="form-control" id="product_id" name="product_id"
                                   value={{$opportunity->product_id}}>
                        </div>
                        <div class="form-group">
                            <label for="price">قیمت</label>
                            <input type="number" class="form-control" id="price" name="price"
                                   value={{$opportunity->price}}>
                        </div>
                        <div class="form-group">
                            <label for="quantity">تعداد</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                   value={{$opportunity->quantity}}>
                        </div>

                        <div class="form-group">
                            <label for="opportunity_explanation">توضیحات</label>
                            <textarea class="form-control" rows="4" id="opportunity_explanation" name="opportunity_explanation"
                                      value={{$opportunity->opportunity_explanation}}></textarea>
                        </div>

                        <div class="form-group">
                            <label for="staopportunity_statustus">وضعیت</label>
                            <select class="form-control" id="opportunity_statusstatus" name="opportunity_status">
                            <option value="follow_up" @if($opportunity->opportunity_status == 'follow_up') selected @endif>در حال پیگیری</option>
                            <option value="ongoing" @if($opportunity->opportunity_status == 'ongoing') selected @endif>در حال اجرا</option>
                            <option value="finished" @if($opportunity->opportunity_status == 'finished') selected @endif>پایان یافته</option>
                            </select>
                        </div>
                        <div class="form-check">


                            <label class="mcui-checkbox">
                                <input type="checkbox" id="op_urgent" name="op_urgent">
                                <div>
                                    <svg class="mcui-check" viewBox="-2 -2 35 35" aria-hidden="true">
                                        <polyline points="7.57 15.87 12.62 21.07 23.43 9.93"/>
                                    </svg>
                                </div>
                                <div class="form-check-label" for="op_urgent">فوری</div>
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
