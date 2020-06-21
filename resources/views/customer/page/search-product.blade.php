@extends('customer.layout.master')

@section('title', 'Page detail')

@section('js')
<script>
    function addcartAppCate(obj,id) {
        var agrs = {
            url: "{{ url('addcartAppCate') }}", // gửi ajax đến file result.php
            type: "get", // chọn phương thức gửi là post
            dataType: "text", // dữ liệu trả về dạng text
            data: { // Danh sách các thuộc tính sẽ gửi đi
                _token: '{{ csrf_token() }}',
                id: id,
                qty: 1,
            },
            success: function (resultApp) {
                $('#resultcategori'+obj.id).html(resultApp);
            }
        };
        $.ajax(agrs);
        return false;
    }
</script>
@endsection

@section('content')
@include('customer.layout.header',array('Categories' => $Categories))
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- shop-top-bar start -->
                    <!-- <div class="shop-top-bar mt-30"> -->
                    <div class="shop-top-bar">    
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Hiển thị 1 đến 9 của 15</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sắp xếp theo:</p>
                                <select class="nice-select">
                                    <option value="sales">Tên (A - Z)</option>
                                    <option value="sales">Tên (Z - A)</option>
                                    <option value="rating">Giá (Thấp &gt; Cao)</option>
                                    <!-- <option value="date">Rating (Lowest)</option> -->
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                        @foreach($searchProduct as $sp)
                                            @if($sp->status == 1)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="single-product.html">
                                                                <img src="{{ asset($sp->image ? 'uploads/products/'.$sp->image : 'customer/assets/images/products/p1_hover.jpg')}}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="{{ url('chi-tiet-san-pham'.'/'.$sp->id.'/'.$sp->slug.'.html') }}">Graphic Corner</a>
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
                                                                <h4><a class="product_name" href="{{ url('chi-tiet-san-pham'.'/'.$sp->id.'/'.$sp->slug.'.html') }}">{{ $sp->name }}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">
                                                                        <?php
                                                                            if ($sp->price_cost == 0){
                                                                                echo number_format($sp->price).' Đ';
                                                                            }else{
                                                                                echo number_format($sp->price_cost).' Đ';
                                                                            }
                                                                        ?>
                                                                    </span>
                                                                    <span>
                                                                        <?php
                                                                            if ($sp->price_cost == 0){
                                                                                echo '';
                                                                            }else{
                                                                                echo number_format($sp->price).' Đ';
                                                                            }
                                                                            ?>
                                                                    </span>
                                                                </div>
                                                                <div id="resultcategoriapp-{{ $sp->id }}" style="text-align: center"></div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a id="app-{{ $sp->id }}" onclick="return addcartAppCate(this,{{ $sp->id }})" >Add to cart</a></li>
                                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $sp -> id }}"><i class="fa fa-eye"></i></a></li>
                                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        @foreach($searchProduct as $sp)
                                            @if($sp->status == 1)
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="single-product.html">
                                                                <img src="{{ asset('uploads/products/'.$sp->image) }}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
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
                                                                <h4><a class="product_name" href="{{ url('chi-tiet-san-pham'.'/'.$sp->id.'/'.$sp->slug.'.html') }}">{{ $sp->name }}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">
                                                                        <?php
                                                                            if ($sp->price_cost == 0){
                                                                                echo number_format($sp->price).' Đ';
                                                                            }else{
                                                                                echo number_format($sp->price_cost).' Đ';
                                                                            }
                                                                        ?>
                                                                    </span>
                                                                    <span class="old">
                                                                        <?php
                                                                            if ($sp->price_cost == 0){
                                                                                echo '';
                                                                            }else{
                                                                                echo number_format($sp->price).' Đ';
                                                                            }
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div>{!! $sp->description !!}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                                <div id="resultcategoriappList-{{ $sp->id }}" style="text-align: center"></div>
                                                                <li class="add-cart"><a id="appList-{{ $sp->id }}" onclick="return addcartAppCate(this,{{ $sp->id }})">Add to cart</a></li>
                                                                <li class="wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter{{ $sp ->id }}" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 pt-xs-15">
                                        <p>Hiển thị 1-12 trong số 13 sản phẩm</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box pt-xs-20 pb-xs-15">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                              <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                        <div class="sidebar-title">
                            <h2>Sản phẩm</h2>
                        </div>
                        <!-- category-sub-menu start -->
                        <div class="category-sub-menu">
                            <ul>
                                @foreach($Categories as $Categorie)
                                    @if(count($Categorie->typeProducts) > 0)
                                        <li class="has-sub"><a href="#">{{ $Categorie->name }}</a>
                                            <ul>
                                                @foreach($Categorie->typeProducts as $typeProduct)
                                                <li><a href="{{ url('loai-san-pham/'.$typeProduct->id.'/'.$typeProduct->slug.'.html') }}">{{ $typeProduct->name }}</a></li> 
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin Quick View | Modal Area -->
    @foreach($searchProduct as $key=>$sp)
        <div class="modal fade modal-wrapper" id="exampleModalCenter{{ $sp -> id }}" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area row">
                            <div class="col-lg-5 col-md-6 col-sm-6">
                               <!-- Product Details Left -->
                                <div class="product-details-left">
                                    <div class="product-details-images slider-navigation-1">
                                        <div class="lg-image"><img src="{{url('uploads/products/'.$sp->image)}}" alt="product image thumb"></div>
                                    </div>
                                    <div class="product-details-thumbs slider-thumbs-1">    
                                        <div class="sm-image"><img src="{{url('uploads/products/'.$sp->image)}}" alt="product image thumb"></div>
                                    </div>
                                </div>
                                <!--// Product Details Left -->
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="product-details-view-content pt-60">
                                    <div class="product-info">
                                        <h2>{{ $sp->name }}</h2>
                                        <div class="price-box pt-20">
                                            <span class="new-price new-price-2">
                                                <?php
                                                    if ($sp->price_cost == 0){
                                                        echo number_format($sp->price).' Đ';
                                                    }else{
                                                        echo number_format($sp->price_cost).' Đ';
                                                    }
                                                ?>
                                            </span>
                                            <span class="old">
                                                <?php
                                                    if ($sp->price_cost == 0){
                                                        echo '';
                                                    }else{
                                                        echo number_format($sp->price).' Đ';
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="product-desc">
                                            <span>{!! $sp->description !!}
                                            </span>
                                        </div>
                                        <div class="single-add-to-cart">
                                            <form action="#" class="cart-quantity">
                                                <div class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" value="1" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </div>
                                                <button class="add-to-cart" type="submit">Add to cart</button>
                                            </form>
                                        </div>
                                        <div class="product-additional-info pt-25">
                                            <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                            <div class="product-social-sharing pt-25">
                                                <ul>
                                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    @endforeach
    <!-- Quick View | Modal Area End Here -->
@endsection
