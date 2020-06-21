@extends('admin.layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header" id="content-header">
        <div class="container-fluid" id="contentPDF">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <h1 class="m-0 text-dark">Danh sách đơn hàng</h1>
                        <button id='print-btn' class="btn btn-success" style="margin-left: 140px">In hóa đơn</button>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@stop

@section('content')
    <div class="row" id="PDFcontent" style="background-color: #ffffff; color: #2C3E50">
        <div class="col-md-12" id="PDFcontent">
            <div class="row">
            <div class="container123  col-md-6"   style="" >
                <h4></h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="col-md-4">Thông tin khách hàng</th>
                        <th class="col-md-6"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Thông tin người đặt hàng</td>
                        <td>{{ $customerInfo->name }}</td>
                    </tr>
                    <tr>
                        <td>Ngày đặt hàng</td>
                        <td>{{ $customerInfo->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{ $customerInfo->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>{{ $customerInfo->address }}</td>
                    </tr>
                    <tr>
                        <td>Hình thức thanh toán</td>
                        <td>{{ $customerInfo->payment }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $customerInfo->email }}</td>
                    </tr>
                    <tr>
                        <td>Ghi chú</td>
                        <td>{{ $customerInfo->bill_note }}</td>
                    </tr>
                    <tr>
                        <td>Trạng thái giao hàng</td>
                        {{--<td>{{ $customerInfo->status }}</td>--}}

                        <td style="color: red;font-size: 20px">@if($customerInfo->status == '1')
                                {{ 'Chưa giao' }}
                            @elseif($customerInfo->status == '2')
                                {{ 'Đang giao' }}
                            @elseif($customerInfo->status == '3')
                                {{ 'Đã giao' }}
                            @elseif($customerInfo->status == '0')
                                {{ 'Chưa xử lý' }}
                            @elseif($customerInfo->status == '4')
                                {{ 'Hủy' }}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
                <div class="col-md-6">
                    <h4></h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50%">Đại diện bên A</th>
                                <th style="width: 50%">Đại diện bên B</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><textarea rows="8" style="width: 100%;">Ký và ghi rõ họ tên</textarea></td>
                            <td><textarea rows="8" style="width: 100%;">Ký và ghi rõ họ tên</textarea></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
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
        </div>
    </div>
    <div class="col-md-12">
        <form action="{{ url('bill') }}/{{ $customerInfo->id_bill }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="form-inline">
                        <label>Cập nhật trạng thái đơn hàng: </label>
                        <select name="status" class="form-control input-inline" style="width: 200px">
                            <option value="1">Chưa giao</option>
                            <option value="2">Đang giao</option>
                            <option value="3">Đã giao</option>
                            <option value="4">Hủy</option>
                        </select>

                        <input type="submit" value="Xử lý" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop
@section('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdf',
                    title: 'Customized PDF Title',
                    filename: 'customized_pdf_file_name'
                }, {
                    extend: 'excel',
                    title: 'Customized EXCEL Title',
                    filename: 'customized_excel_file_name'
                }, {
                    extend: 'csv',
                    filename: 'customized_csv_file_name'
                }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.4/jspdf.plugin.autotable.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script>
        $('#print-btn').click(()=>{
            var pdf = new jsPDF('p','pt','a4');
            pdf.addHTML(document.getElementById("PDFcontent"),function() {
                pdf.save('web.pdf');
            });
        })
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />

@stop
