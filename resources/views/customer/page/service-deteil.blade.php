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
                                        <div class="blog-post wow fadeInUp">
                                            <h1><a href="dịch-vụ/chi-tiet-dịch-vụ/{{ $service_deteil->id }}/{{ $service_deteil->slug }}.html">{{ $service_deteil->title }}</a></h1>
                                            <span class="date-time">{{ $service_deteil->created_at }}</span>
                                            <p class="line-clamp">{!! $service_deteil->content !!}</p>
                                        </div>
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