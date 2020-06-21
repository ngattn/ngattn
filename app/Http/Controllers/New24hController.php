<?php

namespace App\Http\Controllers;

use App\Models\New24h;
use Illuminate\Http\Request;

class New24hController extends Controller
{
    public function getNew24h(){
        $news = New24h::all();
        return view('admin/new24s/index', compact('news'));
    }

    public function getNew24hAdd(){
        return view('admin/new24s/create');
    }

    public function getNew24hStore(Request $request){
        $this->validate(request(), [
            'txtImage' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $fileName = null;
        if (request()->hasFile('txtImage')) {
            $file = request()->file('txtImage');
            $fileName = time().$file->getClientOriginalName() ;
            $file->move('./uploads/news/', $fileName);
        }
        $new = new New24h();

        $new->title = $request->txtname;

        $new->slug = $request->txtslug;

        $new->content = $request->txtContent;

        $new->image = $fileName;

        $new->save();

        return redirect()->route('news');
    }

    public function getDelete($id)
    {
        $contact = New24h::find($id);
        $contact->delete($id);

        return redirect()->route('news')->with('success', 'Chúc mừng bạn đã xóa một bản ghi thành công!');
    }
}
