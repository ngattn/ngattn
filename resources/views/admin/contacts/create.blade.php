@extends('admin.layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('css')


@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm mới sản phẩm</h1>
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

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="row container-fluid">
                <div style="width: 50%;font-size: 20px">Trang thông tin liên hệ</div>
                <div style="width: 50%; float: right">
                    <a href="{{ route('products.index') }}" style="float: right">Quay lại danh sách</a>
                </div>
                <hr>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            {{--                    Content--}}
                            <div class="form-group">
                                <label>Nội dung:</label>

                                <div class="input-group">
                                    <div class="card-body pad">
                                        <div class="" >
                                            <textarea name="txtContent" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('txtContent') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('customer/js/product.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

@stop


