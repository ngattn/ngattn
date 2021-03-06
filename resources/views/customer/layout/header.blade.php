<header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                            <div class="ht-setting-trigger"><span>Tài khoản</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="login-register.html">My Account</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    @if (Route::has('login'))
                                                        @auth
                                                            <li><a href="{{ url('/home') }}">Trang quản trị</a></li>
                                                        @else
                                                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>

                                                            @if (Route::has('register'))
                                                                <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                                            @endif
                                                        @endauth
                                                    @endif
                                                    <!-- <li><a href="login-register.html">Sign In</a></li> -->
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        <!-- <li>
                                            <span class="currency-selector-wrapper">Currency :</span>
                                            <div class="ht-currency-trigger"><span>USD $</span></div>
                                            <div class="currency ht-currency">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">EUR €</a></li>
                                                    <li class="active"><a href="#">USD $</a></li>
                                                </ul>
                                            </div>
                                        </li> -->
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        <li>
                                            <span class="language-selector-wrapper">Language :</span>
                                            <div class="ht-language-trigger"><span>Việt Nam</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list">
                                                    <li  class="active"><a href="#"><img src="{{ asset('customer/images/menu/flag-icon/2.jpg') }}" alt="">Việt Nam</a></li>
                                                    <li><a href="#"><img src="{{ asset('customer/images/menu/flag-icon/1.jpg') }}" alt="">English</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{ route('index') }}">
                                        <img src="{{ asset('customer/images/menu/logo/1.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form method="get" action="{{ url('search-product') }}" class="hm-searchbox">
                                    <!-- <select class="nice-select select-search-category">
                                        <option value="0">All</option> 
                                        @foreach($Categories as $Categorie)  
                                            @if(count($Categorie->typeProducts) > 0)                      
                                                <option value="10">{{ $Categorie->name }}</option>  
                                                @foreach($Categorie->typeProducts as $typeProduct)                   
                                                    <option value="{{ url('loai-san-pham/'.$typeProduct->id.'/'.$typeProduct->slug.'.html') }}">- -  {{ $typeProduct->name }}</option> 
                                                @endforeach
                                            @endif
                                        @endforeach  
                                    </select> -->
                                    <input type="text" placeholder="Enter your search key ..." name="searchProduct" value="<?php echo !empty($valueSearch) ? $valueSearch : ''?>">
                                    <button class="li-btn" type="submit" onclick="window.location.href = '{{ url('search-product') }}'"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="wishlist.html">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">{!! Cart::subtotal() !!} VNĐ
                                                    <span class="cart-item-count">{{ count($content) }}</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    @foreach($content as $iteam)
                                                    <li>
                                                        @foreach($product_by as $val)
                                                            @if($val->id == $iteam->id)
                                                            <a href="single-product.html" class="minicart-product-image">
                                                                <img src="{{asset('')}}uploads/products/{{$val->image}}" alt="cart products">
                                                            </a>
                                                            <div class="minicart-product-details">
                                                                <h6><a href="single-product.html">{{ $iteam->name }}</a></h6>
                                                                <span>{!! number_format($iteam->price,0,",",".")  !!} VNĐ x {{ $iteam->qty }}</span>
                                                            </div>
                                                            <button class="close">
                                                                <a class="btn btn-danger" href="{!! url('xoa-san-pham-trong gh',['id'=>$iteam->rowId]) !!}" ><i class="fa fa-close"></i></a>
                                                            </button>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <p class="minicart-total">Tổng: <span>{!! Cart::subtotal() !!} VNĐ</span></p>
                                                <div class="minicart-button">
                                                    <!-- <a href="checkout.html" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                        <span>View Full Cart</span>
                                                    </a> -->
                                                    <a href="{{ route('cart') }}" class="li-button li-button-fullwidth li-button-sm">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu hb-menu-2 d-xl-block">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('index') }}">TRANG CHỦ</a></li>
                                            <li><a href="{{ route('gioithieu') }}">GIỚI THIỆU</a></li>
                                            <li class="megamenu-static-holder"><a href="#">SẢN PHẨM</a>
                                                <ul class="megamenu hb-megamenu">
                                                    @foreach($Categories as $Categorie)
                                                        @if(count($Categorie->typeProducts) > 0)
                                                            <li><a href="blog-left-sidebar.html">{{ $Categorie->name }}</a>
                                                                <ul>
                                                                    @foreach($Categorie->typeProducts as $typeProduct)
                                                                    <li><a href="{{ url('loai-san-pham/'.$typeProduct->id.'/'.$typeProduct->slug.'.html') }}">{{ $typeProduct->name }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('allNews') }}">TIN TỨC</a></li>
                                            <li><a href="{{ route('dichvu') }}">DỊCH VỤ</a></li>
                                            <li><a href="{{ url('lien-he') }}">LIÊN HỆ</a></li>
                                            <li><a href="{{ url('gop-y') }}">GÓP Ý</a></li>
                                            <!-- Begin Header Bottom Menu Information Area -->
                                            <li class="hb-info f-right p-0 d-sm-none d-lg-block">
                                                <span>Trâu Quỳ, Gia Lâm, Hà Nội</span>
                                            </li>
                                            <!-- Header Bottom Menu Information Area End Here -->
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>