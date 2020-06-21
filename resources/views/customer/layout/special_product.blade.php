<section class="product-area li-laptop-product Special-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Sản phẩm hot</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="special-product-active owl-carousel">
                        @foreach($view_count_many as $value)
                            @if($value->status == 1)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('uploads/products/'.$value->image) }}" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
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
                                                <h4><a class="product_name" href="{{ url('chi-tiet-san-pham'.'/'.$value->id.'/'.$value->slug.'.html') }}">{{ $value->name }}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">
                                                        <?php
                                                            if ($value->price_cost == 0){
                                                                echo number_format($value->price).' Đ';
                                                            }else{
                                                                echo number_format($value->price_cost).' Đ';
                                                            }
                                                        ?>
                                                    </span>
                                                    <span class="old">
                                                        <?php
                                                            if ($value->price_cost == 0){
                                                                echo '';
                                                            }else{
                                                                echo number_format($value->price).' Đ';
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                                <div id="resultcate-{{ $value->id }}"></div>
                                                <!-- <div class="countersection">
                                                    <div class="li-countdown"></div>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a id="cate-{{ $value->id }}" onclick="return addcart(this,{{ $value->id }})" href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#productHome{{ $value->id }}"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>