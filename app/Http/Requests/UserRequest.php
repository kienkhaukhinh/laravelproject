<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtHoten'=>'required',
            'txtUser'=>'required',
            'txtPass' => 'required',
            'txtRePass' =>'required|same:txtPass',
            'txtEmail' => 'required|email',
            'txtSdt' => 'required|numeric'     
        ];
    }
    public function messages(){
        return [
            'txtHoten.required'   => 'Hãy nhập vào họ tên',
            'txtUser.required'   => 'Hãy nhập vào tên tài khoản',
            
            'txtPass.required'   => 'Hãy nhập vào mật khẩu',
            'txtRePass.required' => 'Hãy nhập lại mật khẩu',
            'txtRePass.same'      => 'Hai mật khẩu không khớp',
            'txtEmail.required' => 'Hãy nhập vào địa chỉ Email',
            'txtEmail.email'    =>'Nhập sai cú pháp Email',
            'txtSdt.required'    =>'Hãy nhập vào số điện thoại',
            'txtSdt.numeric'    =>'Số điện thoại không hợp lệ',
        ];
    }
}
