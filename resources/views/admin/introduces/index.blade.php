@extends('admin.layouts.app')

@section('title', 'Giới thiệu công ty')

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
                    <h1 class="m-0 text-dark">Giới thiệu công ty</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin công ty</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@stop

@section('content')
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
            <th style="width: 70%">Nội dung</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($introduces as $introduce)
            <tr>
                <td>{{ $introduce->id }}</td>
                <td style="width: 70%">{!! $introduce->content !!}</td>
                <td>
                    <a href="{{ route('introduces.edit',$introduce->id) }}">
                        <button class="btn btn-warning btn-sm" style="margin-right: 5%; background-color: #0e84b5"><i class="fas fa-edit"></i></button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>id</th>
            <th>Nội dung</th>
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
