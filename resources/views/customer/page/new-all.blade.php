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
                            @foreach($news_all as $news)
                            <div class="col-lg-4 col-md-6">
                                <div class="li-blog-single-item pb-25">
                                    <div class="li-blog-banner">
                                        <a href="tin-tuc/chi-tiet-tin-tu/{{ $news->id }}/{{ $news->slug }}.html"><img class="img-full" src="{{ asset('uploads/news/'.$news->image) }}" alt=""></a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a href="tin-tuc/chi-tiet-tin-tu/{{ $news->id }}/{{ $news->slug }}.html"">{{ $news->title }}</a></h3>
                                            <div class="li-blog-meta">
                                                <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                <!-- <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a> -->
                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{ $news->created_at }}</a>
                                            </div>
                                            <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>
                                            <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Begin Li's Pagination Area -->
                            <div class="col-lg-12">
                                <div class="li-paginatoin-area text-center pt-25">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="li-pagination-box">
                                                <li><a class="Previous" href="#">Previous</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a class="Next" href="#">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Pagination End Here Area -->
                        </div>
                    </div>
                    <!-- Li's Main Content Area End Here -->
                </div>
            </div>
        </div>
        <!-- Li's Main Blog Page Area End Here -->
    </div>
@endsection