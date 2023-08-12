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
        <!-- /.content-header -->
        <!-- Main row -->
        <section class="content">
            <!-- form start -->
            <div class="container-fluid">
                <form role="form" method="post" action="{{route('save_edited_order',['id'=>$order->id])}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="customer_id">customers</label>
                            <select class="form-control" id="customer_id" name="customer_id">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}"
                                            @if($customer->id == $order->customer->id) selected @endif>
                                        Email: {{$customer->email}}
                                        name: {{$customer->last_name}},
                                        ID : {{$customer->id}},
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="seller_id">seller_id</label>
                            <input type="number" class="form-control" id="seller_id" name="seller_id"
                                   value="{{$order->seller_id}}"
                                   placeholder="seller_id">
                        </div>
                        <div class="form-group">
                            <label for="productNum">کد محصول</label>
                            <input type="number" class="form-control" id="productNum" name="productNum"
                                   placeholder="کد محصول">
                        </div>
                        <div class="form-group">
                            <label for="order_total_price">order_total_price</label>
                            <input type="number" class="form-control" id="order_total_price" name="order_total_price"
                                   value="{{$order->order_total_price}}"
                                   placeholder="order_total_price">
                        </div>
                        <div class="form-group">
                            <label for="balance">balance</label>
                            <input type="number" class="form-control" id="balance" name="balance"
                                   readonly
                                   value="{{$order->balance}}"
                                   placeholder="balance">
                        </div>
                        <div class="form-group">
                            <label for="explanations">explanations</label>
                            <textarea class="form-control" id="explanations" name="explanations"
                                      placeholder="explanations">{{$order->explanations}}</textarea>
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
