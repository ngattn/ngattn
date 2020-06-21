<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateProductRequest extends FormRequest
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
            'txtName' => 'required|unique:products,name',
//            'txtKeyword' => 'required|unique:products,keyword',
            'txtDescription' => 'required',
            'txtContent' => 'required',
            'txtPrice' => 'required',
            'txtStock' => 'required',
            'txtcategory' => 'required',
            'txtTypeProduct' => 'required',
            'txtImage'=> 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => 'Tên sản phẩm không được để trống',
            'txtName.unique' => 'Tên sản phẩm không được trùng',
//            'txtKeyword.required' => 'Từ khóa sản phẩm không được để trống',
//            'txtKeyword.unique' => 'Từ khóa sản phẩm không được trùng',
            'txtDescription.required' => 'Mô tả sản phẩm không được để trống',
            'txtContent.required' => 'Nội dung sản phẩm không được để trống',
            'txtPrice.required' => 'Giá sản phẩm không được để trống',
            'txtStock.required' => 'Số lượng phẩm không được để trống',
            'txtcategory.required' => 'Thể loại sản phẩm không được để trống',
            'txtTypeProduct.required' => 'Loại sản phẩm không được để trống',
            'txtImage.required' => 'Bạn chưa chọn ảnh chính',
            'txtImage.image' => 'Tập tin này không phải là hình ảnh'
        ];
    }
}
