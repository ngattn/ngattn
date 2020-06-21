<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateService extends FormRequest
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
            'txtname' => 'required|unique:services,title',
            'txtContent' => 'required',
            'txtImage'=> 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'txtname.required' => 'Tên dịch vụ không được để trống',
            'txtname.unique' => 'Tên dịch vụ không được trùng',
            'txtContent.required' => 'Nội dung dịch vụ không được để trống',
            'txtImage.required' => 'Bạn chưa chọn ảnh chính',
            'txtImage.image' => 'Tập tin này không phải là hình ảnh'
        ];
    }
}
