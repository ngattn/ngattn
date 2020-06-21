<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = CategoryProduct::all();
        return view('admin.categories.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtname'=>'required',
        ]);
        $categoryProduct = new CategoryProduct();

        $categoryProduct->name = $request->txtname;

        $categoryProduct->slug = $request->txtslug;

        $categoryProduct->status = $request->txtDisplay;

        $categoryProduct->save();

        return redirect()->route('categories.index')->with('success', 'Chúc mừng bạn đã tạo mới một bản ghi thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = CategoryProduct::find($id);
//        dd($contact);
        return view('admin.categories.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = CategoryProduct::find($id);
//        dd($contact);
        return view('admin.categories.edit', compact('contact'));
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
        $contact = CategoryProduct::find($id);

        $contact->name = $request->txtname;

        $contact->slug = $request->txtslug;

        $contact->status = $request->txtDisplay;

        $contact->save();

        return redirect()->route('categories.index')->with('success', 'Bạn đã cập nhật thành công bản ghi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = CategoryProduct::find($id);
        $contact->delete();

        return redirect()->route('categories.index')->with('success', 'Bạn đã xóa thành công bản ghi!');
    }
}
