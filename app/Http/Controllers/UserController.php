<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\CreateUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {

        $user = new User();

        $user->name = $request->txtname;

        $user->email = $request->txtemail;

        $user->password = $request->txtpassword;

        $user->role = $request->txtrole;

        $user->gender = $request->txtgender;

        $user->phone_number = $request->txtphone;

        $user->address = $request->txtaddress;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Chúc mừng bạn đã thêm một bản ghi thành công!');
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

    public function getDelete($id)
    {
        $contact = User::find($id);
        $contact->delete($id);

        return redirect()->route('users.index')->with('success', 'Chúc mừng bạn đã xóa một bản ghi thành công!');
    }
}
