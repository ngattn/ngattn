@extends('admin.layouts.app')

@section('title', 'AdminLTE 3 | Dashboard')

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <style>
        td{
            max-width: 80px;


        }
        table.dataTable.nowrap th, table.dataTable.nowrap td{
            white-space: initial !important;

        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ font-awesome/5.11.2/css/all.css font-awesome / 5.11.2 / css / all.css ">
@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@stop

@section('content')
    <button type="button" class="btn btn-success" style="margin-bottom: 10px">
        <a href="{{ route('products.create') }}" style="color: #0f401b">Thêm sản phẩm</a>
    </button>
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>id</th>
            <th>Tên sản phẩm</th>
{{--            <th>Slug</th>--}}
{{--            <th>Từ khóa</th>--}}
{{--            <th>Mô tả</th>--}}
{{--            <th>content</th>--}}
            <th>Ảnh</th>
            <th>Mã sản phẩm</th>
            <th>Giá khuyến mãi</th>
            <th>Trạng thái</th>
            <th>Thông báo</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
{{--                <td>{{ $product->slug }}</td>--}}
{{--                <td>{{ $product->keyword }}</td>--}}
{{--                <td>{!! $product->description !!}</td>--}}
{{--                <td style="display: -webkit-box; -webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;height: 10px">{{ $product->content }}</td>--}}
{{--                <td >{!! $product->content !!}</td>--}}
{{--                <td>{{ $product->image }}</td>--}}
                <td><img class="card-img-top"
                         src="{{url($product->image? 'uploads/products/'.$product->image:'images/noimage.jpg')}}"
                         alt="" width="100%" height="100px"/></td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->price_cost }}</td>
                <td>
                    {{--                    {{ $category->status }}--}}
                    @if($product->status == '1') {{ "Hiển thị" }} @else {{'Không hiển thị'}} @endif
                </td>
                <td><?php if ($product->stock <=3) {
                    echo "<p style='background-color: red'>Sản phẩm sắp hết còn ".$product->stock.' sản phẩm</p>';
                    }
                    else echo "Đang còn ".$product->stock.' sản phẩm'?></td>
                <td style="display: flex; justify-content: center; justify-items: center; padding-top: 40px;">
                    <a href="{{ route('products.show',$product->id) }}" style="margin-right: 5px; ">
                        <button style="margin-right: 5%;background-color: #00da5f"><i class="fas fa-eye"></i></button>
                    </a>
                    <a href="{{asset('products/edit/'.$product->id)}}" style="margin-right: 5px">
                        <button style="margin-right: 5%; background-color: #0e84b5"><i class="fas fa-edit"></i></button>
                    </a>
{{--                    <a href="{{asset('products/delete/'.$product->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">--}}
{{--                        <button type="submit" style="background-color:red"><i class="fas fa-trash-alt" style="background-color: red"></i></button>--}}
{{--                    </a>--}}
                    <a href="#" data-href="{{asset('products/delete/'.$product->id)}}" data-toggle="modal" data-target="#confirm-delete">
                        <button type="submit" style="background-color:red"><i class="fas fa-trash-alt" style="background-color: red"></i></button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>id</th>
            <th>Tên sản phẩm</th>
            {{--            <th>Slug</th>--}}
{{--            <th>Từ khóa</th>--}}
{{--            <th>Mô tả</th>--}}
            {{--            <th>content</th>--}}
            <th>Ảnh</th>
            <th>Mã sản phẩm</th>
            <th>Giá khuyến mãi</th>
            <th>Trạng thái</th>
            <th>Thông báo</th>
            <th>Hành động</th>
        </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-align: center">Bạn có chắc chắn muốn xóa bản ghi này?</h4>
                </div>
                <div class="modal-body">
                    Khi bạn đã xóa thì không thể khôi phục lại được bản ghi này.
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
