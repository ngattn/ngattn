@extends('admin.layouts.app')

@section('title', 'Thêm mới người dùng')

@section('css')

    <style>
        .error{
            color: red;
        }
    </style>

@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm mới người dùng </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới người dùng</li>
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
                <div style="width: 50%;font-size: 20px">Thêm mới người dùng</div>
                <div style="width: 50%; float: right">
                    <a href="{{ route('categories.index') }}" style="float: right">Danh sách</a>
                </div>
                <hr>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('users.store') }}" name="contactForm" >
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ và tên:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="txtname" name="txtname" value="{{ old('txtname') }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ email:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control float-right" id="txtemail" name="txtemail" value="{{ old('txtemail') }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control float-right" id="txtpassword" name="txtpassword" value="{{ old('txtpassword') }}">
                                </div>
                                <!-- /.input group -->
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label>Nhập lại mật khẩu:</label>--}}

{{--                                <div class="input-group">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text">--}}
{{--                                            <i class="fas fa-pen"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <input type="text" class="form-control float-right" id="title" name="txtname">--}}
{{--                                </div>--}}
{{--                                <!-- /.input group -->--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label>Giới tính:</label>

                                <div class="input-group form-inline">
                                    <div class="input-group-prepend">

                                    </div>
                                    <label><input type="radio" name="txtgender" value="nam" checked> Nam</label>
                                    <label style="margin-left: 40px;"><input type="radio" name="txtgender" value="nu"> Nữ</label>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="title" name="txtphone" maxlength="11" value="{{ old('txtphone') }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="title" name="txtaddress" value="{{ old('txtaddress') }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Quyền:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">

                                    </div>
                                    <select name="txtrole" style="width: 100%;height: 38px">
                                        <option value="1">Khách hàng</option>
                                        <option value="0">Admin</option>
                                    </select>
                                </div>

                                <div class="error" id="roleErr"></div>
                                <!-- /.input group -->
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

@stop
