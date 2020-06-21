
@extends('customer.layout.master')

@section('title', 'Page detail')
@section('js')
<script type="text/javascript">
        function updateCart(qty, rowId) {
            console.log(qty);
            $.get(
                '{{asset('/update')}}',
                {qty:qty, rowId:rowId},
                function () {
                    location.reload();
                }
            );
        }
    </script>
@endsection	
@section('content')
@include('customer.layout.header',array(    'Categories'        => $Categories))
	<!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ route('index') }}">Trang chủ</a></li>
                            <li class="active">Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">Xóa</th>
                                                <th class="li-product-thumbnail">Ảnh</th>
                                                <th class="cart-product-name">Tên sản phẩm</th>
                                                <th class="li-product-update">Cập nhật</th>
                                                <th class="li-product-quantity">Số lượng</th>
                                                <th class="li-product-price">Giá sp</th>
                                                <th class="li-product-subtotal">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($content as $iteam)
                                @foreach($product_by as $val)
                                    @if($val->id == $iteam->id)
                                        <tr>
                                            {{--                                                <td class="romove-item"><a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>--}}
                                            <td><a class="btn btn-danger" href="{!! url('xoa-san-pham',['id'=>$iteam->rowId]) !!}" >Xóa</a></td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="{{asset('')}}uploads/products/{{$val->image}}" alt="" style="width: 150px; height: 150px">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a href="detail.html">{{ $iteam->name }}</a></h4>
                                                <div class="row">
                                                    <div class="col-sm-12">
{{--                                                        <div class="rating rateit-small"></div>--}}
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="reviews">
{{--                                                            (06 Reviews)--}}
                                                        </div>
                                                    </div>
                                                </div><!-- /.row -->
                                                <div class="cart-product-info">
{{--                                                    <span class="product-color">COLOR:<span>Blue</span></span>--}}
                                                </div>
                                            </td>
                                            <td class="cart-product-edit">
                                                {{--                                    <a href="#" class="product-edit">Edit</a>--}}
                                                <a href="#" class="updategiohang btn btn-success" id="{{ $iteam->rowId }}">Cập nhật</a>
                                            </td>
                                            <td data-th="Quantity"><input class="form-control text-center qty" value="{{ $iteam->qty }}" type="number" onchange="updateCart(this.value,'{{$iteam->rowId}}')">
                                            </td>
                                            {{--                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">$300.00</span></td>--}}
                                            <td data-th="Price" style="text-align: center">
                                                <?php
                                                if ($val->price_cost == 0){
                                                    echo number_format($val->price,0,",",".") .' VNĐ';
                                                }else{
                                                    echo number_format($val->price_cost,0,",",".").' VNĐ';
                                                }
                                                ?>
                                                {{--                                                    {!! number_format($iteam->price,0,",",".")  !!}--}}
                                            </td>
                                            {{--                                <td class="cart-product-grand-total"><span class="cart-grand-total-price">$300.00</span></td>--}}
                                            <td data-th="Subtotal" class="text-center">
                                                <?php
                                                if ($val->price_cost == 0){
                                                    echo number_format($val->price * $iteam->qty,0,",",".") .' VNĐ';
                                                }else{
                                                    echo number_format($val->price_cost * $iteam->qty,0,",",".") .' VNĐ';
                                                }
                                                ?>
                                                {{--                                                    {!! number_format($iteam->price * $iteam->qty ,0,",",".")  !!}--}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <!-- <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Tổng tiền</h2>
                                            <ul>
                                                <!-- <li>Subtotal <span>{!! Cart::subtotal() !!} VNĐ</span></li> -->
                                                <li>Tổng tiền <span>{!! Cart::subtotal() !!} VNĐ</span></li>
                                            </ul>
                                            <a href="{{ route('dathang') }}">Đặt Hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
        </div>
        <!-- Body Wrapper End Here -->
@endsection