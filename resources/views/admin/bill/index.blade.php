@extends('admin.layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách đơn hàng</h1>
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
    <div class="container">

        <p> Có tổng số {{ count($listOrders) }} đơn hàng</p>
    </div>
    <form method="get" action="">
        <label for="start">Ngày bắt đầu:</label>
<!--        --><?php //var_dump($sday); die();?>
        <input type="date" name="sday" value="<?php echo !empty($sday) ? $sday : '' ?>">
        <label for="start">Ngày kết thúc:</label>
        <input type="date" name="eday" value="<?php echo !empty($sday) ? $eday : '' ?>">
        <label for="start">Chọn trạng thái:</label>
        <select class="mdb-select md-form" searchable="Search here.." name="status">
            <option value=""  selected>Chọn trạng thái đơn hàng</option>
            <option value="0">Chưa xử lý</option>
            <option value="1">Chưa giao</option>
            <option value="2">Đang giao</option>
            <option value="3">Đã giao</option>
            <option value="4">Bị hủy</option>
        </select>
        <button type="submit" class="btn btn-success btn-sm">Tìm kiếm</button>
    </form>
    <table id="example1" class="" style="width:100%">
        <thead>
        <tr>
            <th>id</th>
            <th>Tên người đặt hàng</th>
            <th>Địa chỉ</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th>Action</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listOrders as $listOrder)
            <tr>
                <td>{{ $listOrder->id }}</td>
                <td>{{ $listOrder->name }}</td>
                <td>{{ $listOrder->address }}</td>
                <td>{{ $listOrder->created_at }}</td>
                <td>
                    @if($listOrder->status == '1')
                        {{ 'Chưa giao' }}
                    @elseif($listOrder->status == '2')
                        {{ 'Đang giao' }}
                    @elseif($listOrder->status == '3')
                        {{ 'Đã giao' }}
                    @elseif($listOrder->status == '0')
                        {{ 'Chưa xử lý' }}
                    @elseif($listOrder->status == '4')
                        {{ 'Hủy' }}
                    @endif
                </td>
                <td><a href="{{ url('bill')}}/{{ $listOrder->id }}/edit">Detail</a></td>
                <td>
{{--                    <a href="#" data-href="{{url('deleteBill')}}/{{ $listOrder->id }}" data-toggle="modal" data-target="#confirm-delete">Delete record #23</a>--}}
                    <button class="btn btn-danger btn-sm" data-href="{{url('deleteBill')}}/{{ $listOrder->id }}" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fas fa-trash-alt" style="background-color: red"></i>
                    </button>
{{--                    <form action="{{ url('bill')}}/{{ $listOrder->id }}/" method="post" id="formDelete">--}}
{{--                        <input type="hidden" name="_method" value="DELETE">--}}
{{--                        <input type="submit" value="Delete" class="btn btn-danger">--}}
{{--                        {{ csrf_field() }}--}}
{{--                    </form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>id</th>
            <th>Tên người đặt hàng</th>
            <th>Địa chỉ</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th>Action</th>
            <th>Xóa</th>
        </tr>
        </tfoot>
    </table>
    {{ $listOrders->links() }}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    ...
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
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
