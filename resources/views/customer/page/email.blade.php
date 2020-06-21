<b>Xin chào khách hàng: </b>{{$name}}<br>
{{--{{$email}}--}}
<b>Tổng tiền của bạn là: </b>{{$content}}<br>
@foreach($name_product as $valu)
    {{ $valu }}<br>
@endforeach
<p>Cảm ơn bạn đã tin tưởng mua hàng trên website của cửa hàng chúng tôi!</p>