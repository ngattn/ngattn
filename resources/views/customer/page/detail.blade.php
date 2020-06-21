@extends('customer.layout.master')

@section('title', 'Page detail')

@section('css')
<style type="text/css">
    .an{
        display: none;
    }
</style>
@endsection

@section('js')
<script>
    function addcartDetail(obj) {
        var qty= document.querySelector('#quantity')
        var x= document.querySelector('#successcart');
        var success = document.querySelector('#addsuccess');
        x.classList.add('alert');
        if(qty.value==0){

            x.classList.remove('alert-success');
            x.classList.add('alert-danger');
            x.innerHTML='Bạn chưa Chọn số lượng sản phẩm!';
        }
        if(qty.value<=0){

            x.classList.remove('alert-success');
            x.classList.add('alert-danger');
            x.innerHTML='Số lượng sản phẩm phải lớn hơn 0!';
        }
        else{
            var agrs = {
                url: "{{ url('addcart') }}", // gửi ajax đến file result.php
                type: "get", // chọn phương thức gửi là post
                dataType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    _token: '{{ csrf_token() }}',
                    id: {{ $product_deteil->id }},
                    qty: qty.value,
                },
                success: function (result) {
                    $('#result').html(result);
                    x.classList.remove('alert-danger');
                    x.classList.add('alert-success');
                    x.innerHTML='Thêm Giỏ Hàng Thành Công';
                    success.classList.remove('an');
                    obj.classList.add('an');
                }
            };
            $.ajax(agrs);

        }
    }

    function ktrasale(obj) {
        var x= document.getElementById('errorsale');

        if(obj.value > {{ $product_deteil->stock }}){
            x.classList.remove('alert-danger');
            x.innerHTML= 'Sản phẩm Còn lại không đủ!';
            obj.value=0;
        }
        else{
            x.innerHTML= '';
        }
    }
</script>
@endsection

@section('content')
@include('customer.layout.header',array(    'Categories'        => $Categories))
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="active">{{ $product_deteil->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                   <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="{{url($product_deteil->image? 'uploads/products/'.$product_deteil->image : 'images/noimage.jpg')}}" data-gall="myGallery">
                                    <img src="{{url($product_deteil->image? 'uploads/products/'.$product_deteil->image : 'images/noimage.jpg')}}" alt="product image">
                                </a>
                            </div>
                            @foreach($images as $key=>$image)
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="{{url($image->image? 'uploads/products/image_product/'.$image->image : 'images/noimage.jpg')}}" data-gall="myGallery">
                                        <img src="{{url('uploads/products/image_product/'.$image->image)}}" alt="product image">
                                    </a>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">                         
                            <div class="sm-image"><img src="{{url('uploads/products/'.$product_deteil->image)}}" alt="product image thumb"></div>
                            @foreach($images as $key=>$image)
                            <div class="sm-image"><img src="{{url('uploads/products/image_product/'.$image->image)}}" alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product_deteil->name }}</h2>
                            <!-- <span class="product-details-ref">Reference: demo_15</span>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="review-item"><a href="#">Read Review</a></li>
                                    <li class="review-item"><a href="#">Write Review</a></li>
                                </ul>
                            </div> -->
                            <div class="price-box pt-20">
                                <span class="new-price new-price-1">
                                    <?php
                                        if ($product_deteil->price_cost == $product_deteil->price){
                                            echo number_format($product_deteil->price).' Đ';
                                        }else{
                                            echo number_format($product_deteil->price_cost).' Đ';
                                        }
                                    ?>  
                                </span>
                                <span class="old-price">
                                <?php 
                                    if ($product_deteil->price_cost != $product_deteil->price){
                                        echo number_format($product_deteil->price).' Đ';
                                    } 
                                ?>
                                </span>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span>
                                        {!! $product_deteil->description !!}
                                    </span>
                                </p>
                            </div>
                            <div id="errorsale" style="color: red"></div>
                            <div id="successcart"></div>
                            <div class="single-add-to-cart">
                                <div class="cart-quantity">
                                    <div class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input id="quantity" class="cart-plus-minus-box" value="1" type="text" onchange="ktrasale(this,)">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" onclick="addcartDetail(this,{{ $product_deteil->id }})">Add to cart</button>
                                </div>
                            </div>
                            <div id="addsuccess" class="an">
                                <a href="{{ url('') }}" class="btn btn-outline-primary btn-success" style="margin-top: 15px;"> Tiếp tục Mua hàng</a>
                                <a href="{{ url('cart') }}" class="btn btn-outline-success btn-info" style="margin-top: 15px;"> Tới Xem giỏ Hàng</a>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Thêm vào DS yêu thích</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Security policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Delivery policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Return policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                           <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả sản phẩm</span></a></li>
                           <li><a data-toggle="tab" href="#product-details"><span>Thông số</span></a></li>
                           <li><a data-toggle="tab" href="#reviews"><span>Nhận xét</span></a></li>
                        </ul>               
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                        <span>{!! $product_deteil->description !!}</span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                        <p>{!! $product_deteil->content !!}</p>
                    </div>
                </div>
                <div id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">
                            <div class="comment-review">
                                <span>Grade</span>
                                <ul class="rating">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                            <div class="comment-author-infos pt-25">
                                <span>HTML 5</span>
                                <em>01-12-18</em>
                            </div>
                            <div class="comment-details">
                                <h4 class="title-block">Demo</h4>
                                <p>Plaza</p>
                            </div>
                            <div class="review-btn">
                                <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                            </div>
                            <!-- Begin Quick View | Modal Area -->
                            <div class="modal fade modal-wrapper" id="mymodal" >
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="review-page-title">Write Your Review</h3>
                                            <div class="modal-inner-area row">
                                                <div class="col-lg-6">
                                                   <div class="li-review-product">
                                                       <img src="images/product/large-size/3.jpg" alt="Li's Product">
                                                       <div class="li-review-product-desc">
                                                           <p class="li-product-name">Today is a good day Framed poster</p>
                                                           <p>
                                                               <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                           </p>
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="li-review-content">
                                                        <!-- Begin Feedback Area -->
                                                        <div class="feedback-area">
                                                            <div class="feedback">
                                                                <h3 class="feedback-title">Our Feedback</h3>
                                                                <form action="#">
                                                                    <p class="your-opinion">
                                                                        <label>Your Rating</label>
                                                                        <span>
                                                                            <select class="star-rating">
                                                                              <option value="1">1</option>
                                                                              <option value="2">2</option>
                                                                              <option value="3">3</option>
                                                                              <option value="4">4</option>
                                                                              <option value="5">5</option>
                                                                            </select>
                                                                        </span>
                                                                    </p>
                                                                    <p class="feedback-form">
                                                                        <label for="feedback">Your Review</label>
                                                                        <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                    </p>
                                                                    <div class="feedback-input">
                                                                        <p class="feedback-form-author">
                                                                            <label for="author">Name<span class="required">*</span>
                                                                            </label>
                                                                            <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                        </p>
                                                                        <p class="feedback-form-author feedback-form-email">
                                                                            <label for="email">Email<span class="required">*</span>
                                                                            </label>
                                                                            <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                            <span class="required"><sub>*</sub> Required fields</span>
                                                                        </p>
                                                                        <div class="feedback-btn pb-15">
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                            <a href="#">Submit</a>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Feedback Area End Here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <!-- Quick View | Modal Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Li's Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Sản phảm cùng loại:</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($sanphamcungloai as $spcl)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ url('chi-tiet-san-pham'.'/'.$spcl->id.'/'.$spcl->slug.'.html') }}">
                                            <img src="{{url($spcl->image? 'uploads/products/'.$spcl->image : 'images/noimage.jpg')}}" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="{{ url('chi-tiet-san-pham'.'/'.$spcl->id.'/'.$spcl->slug.'.html') }}">{{ $spcl->name }}</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->
@endsection
