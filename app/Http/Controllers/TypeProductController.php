<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeProducts = TypeProduct::all();
        return view('admin.typeProducts.index', compact('typeProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryProducts = CategoryProduct::all();
        return view('admin.typeProducts.create', compact('categoryProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeProduct = new TypeProduct();

        $typeProduct->category_product_id = $request->txtcategory;

        $typeProduct->name = $request->txtname;

        $typeProduct->slug = $request->txtslug;

        $typeProduct->status = $request->txtDisplay;

        $typeProduct->save();

        return redirect()->route('type-products.index');
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
        $categoryProducts = CategoryProduct::all();

        $contact = TypeProduct::find($id);
//        dd($contact);
        return view('admin.typeProducts.edit', compact('contact', 'categoryProducts'));
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
        $typeProduct = TypeProduct::find($id);

        $typeProduct->category_product_id = $request->txtcategory;

        $typeProduct->name = $request->txtname;

        $typeProduct->slug = $request->txtslug;

        $typeProduct->status = $request->txtDisplay;

        $typeProduct->save();

        return redirect()->route('type-products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeProduct = TypeProduct::find($id);

        $typeProduct->delete();

        return redirect()->route('type-products.index');
    }
}
