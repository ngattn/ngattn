<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->can('admin')){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtname' => 'required',
            'txtemail' => 'required|unique:users,email',
            'txtpassword'=> 'required',
            'txtphone' => 'required',
            'txtaddress' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'txtname.required' => 'Tên không được để trống',
            'txtname.required' => 'Email không được để trống',
            'txtemail.unique' => 'Tên email đã được sử dụng',
            'txtpassword.required' => 'Mật khẩu không được để trống',
            'txtphone.required' => 'Số điện thoại không được để trống',
            'txtaddress.required' => 'Địa chỉ không được để trống'
        ];
    }
}
