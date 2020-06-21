@extends('admin.layouts.app')

@section('title', 'Type products')

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
                    <h1 class="m-0 text-dark">Danh sách loại sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách loại sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@stop

@section('content')
    <button type="button" style="margin-bottom: 15px;" class="btn btn-success"><a href="{{ route('type-products.create') }}">Thêm mới</a></button>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>id</th>
            <th>Thể loại sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Slug</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($typeProducts as $typeProduct)
            <tr>
                <td>{{ $typeProduct->id }}</td>
                <td>{{ $typeProduct->CategoryProduct->name }}</td>
                <td>{{ $typeProduct->name }}</td>
                <td>{{ $typeProduct->slug }}</td>
                <td>
                    {{--                    {{ $category->status }}--}}
                    @if($typeProduct->status == '1') {{ "Hiển thị" }} @else {{'Không hiển thị'}} @endif
                </td>
                <td>
                    <div class="row">
                        <a href="{{ route('type-products.edit',$typeProduct->id) }}">
                            <button class="btn-sm" style="margin-right: 5%; background-color: #0e84b5"><i class="fas fa-edit"></i></button>
                        </a>

    {{--                    <button type="button" class="btn btn-warning"><a href="{{ route('type-products.edit',$typeProduct->id) }}">Edit</a></button>--}}

    {{--                    <form action="{{ route('type-products.destroy',$typeProduct->id) }}" method="post">--}}
    {{--                        @csrf--}}
    {{--                        @method('DELETE')--}}
    {{--                        <button class="btn btn-danger" type="submit">Delete</button>--}}
    {{--                    </form>--}}
                        <form action="{{ route('type-products.destroy',$typeProduct->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" style="margin-left: 6px;" type="submit" onclick="return confirm(' Bạn có muốn xóa mục này?');"><i class="fas fa-trash-alt" style="background-color: red"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>id</th>
            <th>Thể loại sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Slug</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        </tfoot>
    </table>


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
