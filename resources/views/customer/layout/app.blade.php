@extends('customer.layout.master')

@section('title', 'Page Title')

@section('content')
@include('customer.layout.header',array('Categories' => $Categories, 
    'view_count_many'   =>  $view_count_many,
    'content' => $content))
    <!-- Begin Slider With Category Menu Area -->
    <div class="slider-with-banner">
        <div class="container">
            <div class="row">
                <!-- Begin Category Menu Area -->
                @include('customer.layout.category_menu')
                <!-- Category Menu Area End Here -->
                <!-- Begin Slider Area -->
                @include('customer.layout.begin_slider')
                <!-- Slider Area End Here -->
            </div>
        </div>
    </div>
    <!-- Slider With Category Menu Area End Here -->
    <!-- Begin Li's Static Banner Area -->
    @include('customer.layout.static_banner')
    <!-- Li's Static Banner Area End Here -->
    <!-- Begin Li's Special Product Area -->
    
    <!-- Li's Special Product Area End Here -->
    <!-- Begin Li's Laptops Product | Home V2 Area -->

    @foreach($Categories as $Categorie)
        @if(count($Categorie->typeProducts) > 0)
            <section class="product-area li-laptop-product li-laptop-product-2 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>{{ $Categorie->name }}</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($Categorie->typeProducts as $value)
                                        @if($value->status == 1)
                                            @foreach($value->product as $products)
                                                <div class="col-lg-12">
                                                    <!-- single-product-wrap start -->
                                                    @if($products->status == 1)
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <a href="single-product.html">
                                                                    <img src="{{ asset('uploads/products/'.$products->image) }}" alt="Li's Product Image">
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
                                                                    <h4><a class="product_name" href="{{ url('chi-tiet-san-pham'.'/'.$products->id.'/'.$products->slug.'.html') }}">{{ $products->name }}</a></h4>
                                                                    <div class="price-box" style="font-size: 10px">
                                                                        <span class="new-price new-price-2">
                                                                            <?php
                                                                                if ($products->price_cost == $products->price){
                                                                                    echo number_format($products->price).' Đ';
                                                                                }else{
                                                                                    echo number_format($products->price_cost).' Đ';
                                                                                }
                                                                            ?>
                                                                        </span>
                                                                        <span class="old-price">
                                                                            <?php
                                                                                if ($products->price_cost == $products->price){
                                                                                    echo '';
                                                                                }else{
                                                                                    echo number_format($products->price).' Đ';
                                                                                }
                                                                            ?>
                                                                        </span>
                                                                        <span class="discount-percentage"></span>
                                                                    </div>
                                                                    <div id="resultHomecateHome-{{ $products->id }}"></div>
                                                                </div>
                                                                <div class="add-actions">
                                                                    <ul class="add-actions-link">
                                                                        <li class="add-cart active"><a id="cateHome-{{ $products->id }}" href="#" onclick="return addcartHome(this,{{ $products->id }})">Add to cart</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            @endforeach
                                        @endif  
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
        @endif
    @endforeach

@endsection 
<script>
    function addcartHome(obj,id) {
        var agrs = {
            url: "{{ url('addcartHome') }}", // gửi ajax đến file result.php
            type: "get", // chọn phương thức gửi là post
            dataType: "text", // dữ liệu trả về dạng text
            data: { // Danh sách các thuộc tính sẽ gửi đi
                _token: '{{ csrf_token() }}',
                id: id,
                qty: 1,
            },
            success: function (result) {
                $('#resultHome' + obj.id).html(result);
            }
        };
        $.ajax(agrs);
        return false;
    }
</script>    