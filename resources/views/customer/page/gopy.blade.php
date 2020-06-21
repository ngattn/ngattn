@extends('customer.layout.master')

@section('title', 'Page detail')

@section('js')

@endsection

@section('content')
@include('customer.layout.header',array('Categories' => $Categories))
    <div class="body-wrapper">
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog Three Column</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Li's Main Blog Page Area -->
        <div class="li-main-blog-page pt-60 pb-55">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Main Content Area -->
                    <div class="col-lg-12">
                        <div class="row li-main-content">
                            <div class='col-xs-12 col-sm-12 col-md-12 rht-col'>
                                <div class="detail-block">
                                    <div class="row">
                                        <div class="col-sm-12">
					                        @if(session()->get('success'))
					                            <div class="alert alert-success">
					                                {{ session()->get('success') }}
					                            </div>
					                        @endif
					                    </div>
					                    <form method="POST" action="{{ url('gop-y') }}" enctype="multipart/form-data">
					                        @csrf
					                        <div class="form-group">
					                            <label for="exampleInputEmail1">Đia chỉ email</label>
					                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="tranngatnb1@gmail.com" name="txtemail">
					                        </div>
					                        <div class="form-group">
					                            <label for="exampleFormControlTextarea1">Nội dung góp ý</label>
					                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="txtcontent"></textarea>
					                        </div>
					                        <button type="submit" class="btn btn-primary">Submit</button>
					                    </form>
                                    </div><!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Main Content Area End Here -->
                </div>
            </div>
        </div>
        <!-- Li's Main Blog Page Area End Here -->
    </div>
@endsection