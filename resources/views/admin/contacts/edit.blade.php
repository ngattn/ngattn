@extends('admin.layouts.app')

@section('title', 'Add new category')

@section('css')


@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa thông tin liên hệ </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin liên hệ</li>
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
                <div style="width: 50%;font-size: 20px">Sửa thông tin liên hệ</div>
                <div style="width: 50%; float: right">
                    <a href="{{ route('contacts.index') }}" style="float: right">Danh sách</a>
                </div>
                <hr>
            </div>
            <hr>
            <form method="POST" action="{{ route('contacts.update',$contact->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nội dung:</label>

                        <div class="input-group">
                            <div class="card-body pad">
                                <div class="" >
                                    <textarea name="txtContent" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $contact->content }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
@stop

