@extends('admin.layouts.app')

@section('title', 'Add new slide')

@section('css')


@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add new slide </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add new slide</li>
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
                <div style="width: 50%;font-size: 20px">Create a new slide</div>
                <div style="width: 50%; float: right">
                    <a href="{{ route('slides.index') }}" style="float: right">Back list</a>
                </div>
                <hr>
            </div>
            <hr>
            <form method="POST" action="{{ route('slides.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Ảnh:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file"  name="file_image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')

@stop

