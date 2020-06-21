<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin/slides/index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slides/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide;
        if ( $request->hasFile('file_image')){
            $file = $request->file("file_image");
            $duoi = $file->getClientOriginalExtension();
            if ($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg') {
                return redirect('slides/create')->with('thongbao','Ban chi them anh slide co duoi la aa');
            }
            $name = $file->getClientOriginalName();
            $file_path = str_random(4).time()."_".$name;
            while (file_exists("./uploads/slides/".$file_path)) {
                $file_path = str_random(4).time()."_".$name;
            }
            $file->move("./uploads/slides/",$file_path);
            $slide->file_path= $file_path;
        }
        else{
            $slide->file_path= "";
        }
        $slide->save();
        return redirect('slides')->with('success', 'Chúc mừng bạn đã thêm một ảnh slide thành công!');
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

    }

    public function getDelete($id)
    {
        $contact = Slide::find($id);
        File::delete('./uploads/slides/'.$contact->file_path);
        $contact->delete($id);

        return redirect()->route('slides.index')->with('success', 'Chúc mừng bạn đã xóa một bản ghi thành công!');
    }
}
