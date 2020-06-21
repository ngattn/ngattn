<?php

namespace App\Http\Controllers;

use App\Models\Service;
//use Illuminate\Http\Request;
use App\Http\Requests\CreateService;
use Illuminate\Support\Facades\Input;
use File;
use Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin/services/index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/services/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateService $request)
    {


        $fileName = null;
        if (request()->hasFile('txtImage')) {
            $file = request()->file('txtImage');
            $fileName = time().$file->getClientOriginalName() ;
            $file->move('./uploads/services/', $fileName);
        }
        $service = new Service();

        $service->title = $request->txtname;

        $service->slug = $request->txtslug;

        $service->content = $request->txtContent;

        $service->image = $fileName;

        $service->save();

        return redirect()->route('services.index');
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
        $contact = Service::find($id);
//        dd($contact);
        return view('admin.services.edit', compact('contact'));
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
        $service = Service::find($id);
        $service-> title = Request::input('txtname');
        $service -> content = Request::input('txtContent');
        $service -> slug = Request::input('txtslug');
        $img_current = './uploads/services/'.Request::input('img_current');
        if(!empty(Request::file('fimage'))){
            $file_name = Request::file('fimage')->getClientOriginalName();
            $service->image = $file_name;
            Request::file('fimage')->move('./uploads/services/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
//            var_dump($file_name);die();
        } else{
            echo "Không có file";
        }
//        var_dump(Request::file('fimage'));die();
        $service->save();

        return redirect('/services') ->with('success', ' Cập nhật thành công');
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

    public function getDelete($id)
    {
        $contact = Service::find($id);
        $contact->delete($id);

        return redirect()->route('services.index')->with('success', 'Chúc mừng bạn đã xóa một bản ghi thành công!');
    }
}
