<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cbbCateParent'=>'required',
            'txtName'=>'required|unique:products,name',
            'fImages'=>'required|image'
        ];
    }

    public function messages()
    {
        return [
            'cbbCateParent.required'=>'Vui lòng chọn loại sản phẩm',
            'txtName.required'=>'Vui lòng nhập tên sản phẩm',
            'txtName.unique'=>'Tên sản phẩm đã tồn tại',
            'fImages.required'=>'Vui lòng chọn ảnh sản phẩm',
            'fImages.image'=>'Vui lòng nhập đúng định dạng ảnh'
        ];
    }
}
