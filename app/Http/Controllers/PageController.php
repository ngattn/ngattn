<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Contact;
use App\Models\FeedBackUser;
use App\Models\New24h;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slide;
use App\Models\TypeProduct;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use DB;
use Cart;
use Mail;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        $Products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $news = New24h::all();
        $product_host = DB::table('products')->where('hot', '1')->get();
        $product_news = DB::table('products')->select('products.*')->where('products.status','1')->orderBy('products.id', 'desc')
                        ->join('type_products', 'products.type_product_id', '=', 'type_products.id')
                        ->where('type_products.status','1')
                        ->join('category_products', 'type_products.category_product_id', '=', 'category_products.id')
                        ->where('category_products.status','1')
                        ->get();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer.layout.app', compact('slides', 'Products','Categories',
            'loai_sp', 'content', 'total','product_by', 'news', 'product_host', 'product_news', 'view_count_many'));
    }

    public function getDetail($idct)
    {
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $product_deteil = DB::table('products')->where('id', $idct)->first();
        $images = DB::table('product_image')->select('id','image')->where('product_id',$product_deteil->id)->get();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $sanphamcungloai = Product::where('type_product_id', $product_deteil->type_product_id)->inRandomOrder()
                            ->Limit(10)
                            ->get();
        $product_host = DB::table('products')->where('hot', '1')->get();
        $productKey = 'product_' . $idct;
        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($productKey)) {
            Product::where('id', $idct)->increment('view_count');
            Session::put($productKey, 1);
        }
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer/page/detail', compact('slides','products', 'Categories', 'product_deteil',
            'images', 'loai_sp', 'content', 'total','product_by', 'sanphamcungloai', 'product_host', 'view_count_many'));
    }

    public function muahang($id){
        $product_by = DB::table('products')->where('id',$id)->first();
        $content = Cart::content();
        return redirect()->route('giohang');
    }

    public function giohang(){
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $product_by = DB::table('products')->get();
        $content = Cart::content();
        $total = Cart::total();
        return view('customer/page/cart', compact('content','total','product_by', 'Categories'));
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
    }

    public function capnhat(){
        if (Request()->ajax()) {
            $id = Request()->get('id');
            $qty= Request()->get('qty');
            Cart::update($id,$qty);
            echo "oke";
        }
    }

    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    public function xoasanphamtronggiohang($id){
        Cart::remove($id);
        return redirect()->route('index');
    }

    public function getCheckOut(){
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = DB::table('products')->get();
        return view('customer/page/dathang', compact('content','total', 'product_by', 'Categories'));
    }

    public function postCheckOut(Request $request){
        $abcd =$request->total;
        $str = str_replace( array(',', '.00 VNĐ'), array('', ''), $abcd );
        $name_product = $request->name_product;
        $product_name = [];
        if (!empty($name_product)){
            foreach ($name_product as $name_pr)
            {
                $pr_name = $name_pr;
                array_push($product_name, $pr_name);
            }
            $content = Cart::content();
            $product_by = DB::table('products')->get();

            $customer = new Customer;
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phone;
            $customer->note = $request->note;
            $customer->save();

            $bill = new Bill;
            $bill->id_customer = $customer->id;
            $bill->payment = $request->payment_method;
            $bill->note = $request->note;
            $bill->total = $request->total;
            $bill->total = $str;
            $bill->save();

            foreach ($content as $value){
                $billDetail = new BillDetail();
                $billDetail->id_bill = $bill->id;
                $billDetail->id_product = $value->id;
                $billDetail->quantity= $value->qty;
                $billDetail->unit_price = $value->price;
                $billDetail->status = 0;
                $billDetail->save();

                $ahihi = $value->id;
                $abc = $value->qty;
                $productstock = Product::find($ahihi);
                $productstock->stock = ($productstock->stock) - $abc;
                $productstock->save();

            }

            $input = $request->all();
            $email = $request->email;
            Mail::send('customer/page/email', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['total'],
                'name_product'=>$product_name),
                function($message)  use ($email){
                $message->from('tranngatnb1@gmail.com', 'Cửa hàng Vượng Trường');
                $message->to($email, $email);
                $message->subject('Xác nhận hóa đơn mua hàng của cửa hàng Vượng Trường');
                $message->cc('tranngatnb1@gmail.com', 'Cửa hàng Vượng Trường');
            });
            Cart::destroy();
            return redirect()->route('dathang', compact('product_by'))->with('thongBao', 'Chúc mừng bạn đã đặt hàng thành công');
        }
        else{
            return redirect()->route('index');
        }
    }

    public function getTinTuc($slug){
        $news_detail = DB::table('news')->where('slug', $slug)->first();
        $slides = Slide::all();
        $Products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer/page/new-detail', compact('news_detail', 'slides', 'Products',
            'Categories', 'loai_sp', 'content', 'total','product_by', 'view_count_many'));
    }

    public function getLoaiSanPham($id){
        $slides = Slide::all();
        $Products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $news = New24h::all();

        $loaisanpham_id = TypeProduct::find($id);
        $sanpham = Product::where('type_product_id', $id)->paginate(16);
        $product_host = DB::table('products')->where('hot', '1')->get();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer.page.categori', compact('slides', 'Products','Categories',
            'loai_sp', 'content', 'total','product_by', 'news', 'loaisanpham_id', 'sanpham', 'product_host', 'view_count_many'));
    }

    public function introduce(){
        $introduce = DB::table('introduces')->first();
        $slides = Slide::all();
        $Products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer/page/introduce', compact('introduce', 'slides', 'Products',
            'Categories', 'loai_sp', 'content', 'total','product_by', 'view_count_many'));
    }

    public function service(){
        $slides = Slide::all();
        $Products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $services  = DB::table('services')->paginate(3);
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer/page/service', compact( 'slides', 'Products',
            'Categories', 'loai_sp', 'content', 'total','product_by', 'services', 'view_count_many'));
    }

    public function getservice($id)
    {
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        $service_deteil = DB::table('services')->where('id', $id)->first();

        return view('customer/page/service-deteil', compact('slides','products', 'Categories'
            , 'loai_sp', 'content', 'total','service_deteil','view_count_many'));
    }

    public function allNew(){
        $Products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $services  = DB::table('services')->paginate(3);
        $news_all = DB::table('news')->paginate(5);
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        return view('customer/page/new-all', compact(  'Products',
            'Categories', 'loai_sp', 'content', 'total','product_by', 'services', 'view_count_many', 'news_all'));
    }

    public function gettin($id)
    {
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();
        $new_deteil = DB::table('news')->where('id', $id)->first();

        return view('customer/page/new-detail', compact('slides','products', 'Categories'
            , 'loai_sp', 'content', 'total','new_deteil','view_count_many'));
    }

    public function searchProduct(Request $request){
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $valueSearch = $request->get('searchProduct');
        $searchProduct = DB::table('products')
            ->where('name', 'like', '%' . $valueSearch . '%')
        ->get();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();

        return view('customer/page/search-product', compact('slides','products', 'Categories'
            , 'loai_sp', 'content', 'total','view_count_many', 'searchProduct', 'product_by', 'valueSearch'));
    }

    public function contact(){
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $contacts = Contact::all();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(6)->get();

        return view('customer/page/contact', compact('slides','products', 'Categories'
            , 'loai_sp', 'content', 'total','view_count_many', 'product_by', 'contacts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addcart(Request $request){
        $product= Product::find($request->id);
        $abc= Cart::add(array('id'=>$product->id,'name'=>$product->name, 'qty'=>$request->qty,'price' => $product->price_cost, 'weight' => 10, 'options' => [$product->image, $product->price_cost]));
        $content = Cart::content();
        $html= '<div class="alert alert-success" style="padding: 5px">Thêm Vào Giỏ Thành Công!</div>'
            .'<a href="'.url('cart') .'" class="btn btn-outline-primary btn-success">Tới giỏ hàng</a>';
        echo $html;
    }

     public function addcartHome(Request $request){
        $product= Product::find($request->id);
        // var_dump('product = ', $product);die();
        $abc= Cart::add(array('id'=>$product->id,'name'=>$product->name, 'qty'=>$request->qty,'price' => $product->price_cost, 'weight' => 10, 'options' => [$product->image, $product->price_cost]));
        $content = Cart::content();
        $html= '<div class="alert alert-success" style="padding: 5px">Thêm Vào Giỏ Thành Công!</div>'
            .'<a href="'.url('cart') .'" class="btn btn-outline-primary btn-success">Tới giỏ hàng</a>';
        echo $html;
    }

    public function addcartApp(Request $request){
        $product= Product::find($request->id);
        $abc= Cart::add(array('id'=>$product->id,'name'=>$product->name, 'qty'=>$request->qty,'price' => $product->price_cost, 'weight' => 10, 'options' => [$product->image, $product->price_cost]));
        $content = Cart::content();
        $html= '<div class="alert alert-success">Thêm Vào Giỏ Hàng thành công!</div>'
            .'<a href="'.url('cart') .'" class="btn btn-outline-primary">Tới giỏ hàng</a>';
        echo $html;
    }

    public function addcartAppCate(Request $request){
        $product= Product::find($request->id);
        $abc= Cart::add(array('id'=>$product->id,'name'=>$product->name, 'qty'=>$request->qty,'price' => $product->price_cost, 'weight' => 10, 'options' => [$product->image, $product->price_cost]));
        $content = Cart::content();
        $html= '<div class="alert alert-success" style="padding: 5px">Thêm Vào Giỏ Thành Công!</div>'
            .'<a href="'.url('cart') .'" class="btn btn-outline-primary btn-success">Tới giỏ hàng</a>';
        echo $html;
    }

    public function cart(){
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $content = \Cart::Content();
        $data['tong']=0;
        foreach ($content as $value){
            $data['tong'] += $value->quantity*$value->price;
        }
        $product_by = Product::all();

        return view('customer/page/giohang',compact('product_by','data','content', 'Categories'));
    }

    public function getgopy(){
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(9)->get();

        return view('customer/page/gopy', compact('slides','products', 'Categories'
            , 'loai_sp', 'content', 'total','view_count_many', 'product_by'));
    }

    public function postgopy(Request $request){
        $slides = Slide::all();
        $products = Product::all();
        $Categories = CategoryProduct::where('status', '=', 1)->get();
        $loai_sp = TypeProduct::all();
        $content = Cart::content();
        $total = Cart::total();
        $product_by = Product::all();
        $view_count_many = Product::orderBy('view_count', 'desc')->take(9)->get();
        $contact = new FeedBackUser();

        $contact->title = $request->txtemail;

        $contact->content = $request->txtcontent;

        $contact->save();

        return redirect()->route('gop-y', compact('slides','products', 'Categories'
            , 'loai_sp', 'content', 'total', 'product_by','view_count_many'))->with('success', 'Cảm ơn bạn đã góp ý!');
    }
}
