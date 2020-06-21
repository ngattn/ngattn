<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\TypeProduct;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use File;
use Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryProducts = CategoryProduct::all();
        $typeProducts = TypeProduct::all();
        return view('admin.products.create', compact('categoryProducts','typeProducts'));
    }

    private function generateRandomString($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= str_shuffle($characters[mt_rand(0, $charactersLength - 1)]);
        }
        return $randomString;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        $fileName = null;
        if (request()->hasFile('txtImage')) {
            $file = request()->file('txtImage');
            $fileName = time().$file->getClientOriginalName() ;
            $file->move('./uploads/products/', $fileName);
        }

        $product = new Product();
            $randomstr = $this->generateRandomString();
            $product->name = request()->txtName;
            $product->keyword = request()->txtKeyword;
            $product->description = request()->txtDescription;
            $product->content = request()->txtContent;
            $product->image = $fileName;
            $product->sku = $randomstr;
            $product->price_cost = request()->txtPriceCost;
            $product->price = request()->txtPrice;
            $product->stock = request()->txtStock;
            $product->status = request()->description;
            $product->slug = request()->txtSlug;
            $product->status = request()->txtDisplay;
            $product->type_product_id = request()->txtTypeProduct;
        $product->save();
        $product_id = $product->id;
        if(request()->hasFile('fProductDetail')){
            foreach (request()->file('fProductDetail') as $file){
                $product_img = new ProductImage();
                if(isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('./uploads/products/image_product/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        return redirect()->route('products.index')->with('success', ' Thêm mới sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryProducts = CategoryProduct::all();
        $typeProducts = TypeProduct::all();
        $products = Product::find($id);
        $products_image = Product::find($id)->ProductImage;
//        var_dump($Categories);die();
        return view('admin.products.show', compact('categoryProducts','typeProducts', 'products','products_image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $categoryProducts = CategoryProduct::all();
//        $typeProducts = TypeProduct::all();
//        $products = Product::find($id);
//        dd($products);
//        return view('admin.products.edit', compact('categoryProducts','typeProducts', 'products'));
    }

    public function getEdit($id){
        $categoryProducts = CategoryProduct::all();
        $typeProducts = TypeProduct::all();
        $products = Product::find($id);
        $products_image = Product::find($id)->ProductImage;
//        var_dump($Categories);die();
        return view('admin/products/edit', compact('categoryProducts','typeProducts', 'products','products_image'));
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

    public function getDelete($id){
        $product_detail = Product::find($id)->ProductImage->toArray();
        foreach ($product_detail as $value){
            File::delete('./uploads/products/image_product/'.$value['image']);
        }
        $product = Product::find($id);
        File::delete('./uploads/products/'.$product->image);
        $product->delete($id);
        return redirect('/products') ->with('success', ' Xoa công thành công');
    }

    public function getTypeProduct($idCateqory){
        $idCate = TypeProduct::where('category_product_id', $idCateqory)->get();
//        dd($idCate);
        foreach ($idCate as $value){
            echo "<option value='".$value ->id."'>$value->name</option>";
        }
    }

    public function getDelImg($id){
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = ProductImage::find($idHinh);
            if(!empty($image_detail)){
                $img = './uploads/products/image_product'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }

    public function postEdit($id, Request $request){
        $product = Product::find($id);
        $product-> name = Request::input('txtName');
        $product -> keyword = Request::input('txtKeyword');
        $product -> description = Request::input('txtDescription');
        $product -> content = Request::input('txtContent');
        $product -> sku = Request::input('txtSKU');
        $product -> price_cost = Request::input('txtPriceCost');

        $product -> price = Request::input('txtPrice');
        $product -> stock = Request::input('txtStock');
        $product -> status = Request::input('txtDisplay');
        $product -> type_product_id = Request::input('txtTypeProduct');
        $img_current = './uploads/products/'.Request::input('img_current');
        if(!empty(Request::file('fimage'))){
            $file_name = Request::file('fimage')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fimage')->move('./uploads/products/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        } else{
            echo "Không có file";
        }
        $product->save();
        if (!empty(Request::file('fProductDetail'))){
//            print_r(Request::file('fProductDetail'));
            foreach (Request::file('fProductDetail') as $file){
                $product_img = new ProductImage();
                if (isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move('./uploads/products/image_product/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect('/products') ->with('success', ' Cập nhật thành công');
    }
}
