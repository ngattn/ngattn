@extends('admin.layouts.app')

@section('title', 'AdminLTE 3 | Dashboard')


@section('content')
    @if(Auth::user()->role == '0')
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($bills) }}</h3>

                        <p>Tổng số đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('bill.index') }}" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count($products) }}
                            {{--                        <sup style="font-size: 20px">%</sup>--}}
                        </h3>

                        <p>Tổng số sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($guest) }}</h3>

                        <p>Tổng số khách hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ count($news) }}</h3>

                        <p>Tổng số bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        {{--    <div class="col-md-12">--}}
        {{--        <script src="https://code.highcharts.com/highcharts.js"></script>--}}
        {{--        <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
        {{--        <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
        {{--        <div id="containerchart" style="height: 400px; margin: 0 auto"></div>--}}
        {{--    </div>--}}
        <div class="col-md-12">
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Xu hướng đặt hàng trên web </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

    @else
        Chúc mừng bạn đã đăng ký tài khoản thành viên thành công!<br><br>
        Bạn click vào đây để mua hàng
        <button type="button" style="margin-bottom: 15px;" class="btn btn-success btn-sm"><a href="{{ route('index') }}" style="color: #ffffff">Mua hàng</a></button>
        <br>
        Trạng thái đơn hàng của bạn đã mua trên trang web của chúng tôi
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($billInfo as $key => $bill)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $bill->product_name }}</td>
                    <td>{{ $bill->quantity }}</td>
                    <td>{{ number_format($bill->unit_price) }} VNĐ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><b>Tổng tiền</b></td>
                <td colspan="1">
                    <b class="text-red">{{ $customerInfo->bill_total }}</b>
                </td>
            </tr>
            </tbody>
        </table>
    @endif

@stop

@section('js')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    {{--    <script src="{{ asset('customer/js/chart.js') }}"></script>--}}
    <script src="{{ asset('customer/js/create-charts.js') }}"></script>
    {{--    <script src="{{ asset('customer/js/Chart.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('customer/js/jquery.min.js') }}"></script>--}}
@endsection
