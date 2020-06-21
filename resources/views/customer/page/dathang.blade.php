@extends('customer.layout.master')

@section('title', 'Page detail')

@section('content')
@include('customer.layout.header',array(    'Categories'        => $Categories))
	<div class="body-wrapper">
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="detail-block">
                            <div id="content">
                                @if(session('thongBao'))
                                    <div class="alert alert-success">
                                        {{ session('thongBao') }}
                                    </div>
                                @endif
                                <form action="{{ route('dathang') }}" method="post" class="beta-form-checkout">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="formGroupExampleInput">Họ tên (*)</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" id="name" name="name" placeholder="Họ tên" required class="txtinput" style="width: 100%" value="<?php echo !empty(Auth::user()->name) ? Auth::user()->name : "" ?>">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="formGroupExampleInput">Giới tính</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%; height: 15px"><span style="margin-right: 10%; ">Nam</span>
                                                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%; height: 15px"><span>Nữ</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="formGroupExampleInput">Email (*)</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com" class="txtinput" style="width: 100%" value="<?php echo !empty(Auth::user()->email) ? Auth::user()->email : ""?>">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="formGroupExampleInput">Địa chỉ (*)</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" id="address" name="address" placeholder="Street Address" required class="txtinput" style="width: 100%" value="<?php echo !empty(Auth::user()->address) ? Auth::user()->address : "" ?>">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="formGroupExampleInput">Điện thoại (*)</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="number" id="phone" name="phone" required class="txtinput" style="width: 100%" value="<?php echo !empty(Auth::user()->phone_number) ? Auth::user()->phone_number : "" ?>">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="exampleFormControlTextarea1">Ghi chú</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <textarea id="notes" name="note" class="form-control txtinput" id="exampleFormControlTextarea1" rows="3" style="width:100%;"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="your-order">
                                                <div class="your-order-head"><h5 style="color: #d62728">Đơn hàng của bạn: </h5></div>
                                                <div class="your-order-body" style="padding: 0px 10px">
                                                    <div class="your-order-item">
                                                        @foreach($content as $it)
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    @foreach($product_by as $val)
                                                                        @if($val->id == $it->id)
                                                                            <img width="100%" src="{{asset('')}}uploads/products/{{$val->image}}" alt="" class="pull-left">
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <p>Tên sản phẩm: {{ $it->name }}</p>
                                                                    <input hidden readonly type="text" name="name_product[]" value="{{ 'Tên sản phẩm: '.$it->name.'    Số lượng: '.$it->qty.'    Giá: '.$it->price }}"><br>
                                                                    <p>Số lượng: {{ $it->qty }}</p>
                                                                    <p>Đơn giá: {!! number_format($it->price,0,",",".")  !!} VNĐ</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="your-order-item">
                                                        <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                                        <div class="pull-right"><h5 class="color-black"><input name="total" value="{!! Cart::subtotal() !!} VNĐ" readonly/></h5></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <div class="your-order-head"><h5 style="color: #d62728">Hình thức thanh toán</h5></div>

                                                <div class="your-order-body">
                                                    <ul class="payment_methods methods">
                                                        <li class="payment_method_bacs">
                                                            <div class="row">
                                                                <div style="width: 10%">
                                                                    <input id="payment_method_bacs" type="radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" style="height: 15px">
                                                                </div>
                                                                <div style="width: 80%">
                                                                     <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                                                </div>
                                                            </div>  
                                                            <div class="payment_box payment_method_bacs" style="display: block;">Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                                                    </div>
                                                            
                                                        </li>

                                                        <li class="payment_method_cheque">
                                                            <div class="row">
                                                                <div style="width: 10%">
                                                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" style="height: 15px">
                                                                </div>
                                                                <div style="width: 80%">
                                                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                                                </div>
                                                            </div>
                                                            <div class="payment_box payment_method_bacs" style="display: block;">
                                                                <p>Chuyển tiền đến tài khoản sau:</p>
                                                                <p>- Số tài khoản: 123 456 789</p>
                                                                <p>- Chủ TK: Lê A</p>
                                                                <p>- Ngân hàng ACB</p>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="text-center">
                                                    <a href="{{ route('index') }}" >Tiếp tục mua hàng</a>
                                                    <button type="submit" class="beta-btn primary" href="{{ route('dathang') }}">Đặt hàng <i class="fa fa-chevron-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Checkout Area End-->
        </div>
@endsection
