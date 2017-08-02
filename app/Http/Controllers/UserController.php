<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function getList(){
    	$user=User::select('id','hoten','username','level','created_at','email','sdt','diachi')->orderBy('id','DESC')->get()->toArray();

    	return view('admin.user.list',compact('user'));
    }
     public function getAdd(){
    	return view('admin.user.add');
    }
     public function postAdd(UserRequest $request){
    	$user=new User();
        $user->hoten=$request->txtHoten;
    	$user->username=$request->txtUser;
    	$user->password=Hash::make($request->txtPass);
    	$user->email=$request->txtEmail;
        $user->sdt=$request->txtSdt;
        $user->diachi=$request->txtDiachi;
    	$user->level=$request->rdoLevel;
    	$user->remember_token=$request->_token;
    	$user->save();
    	return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Thêm tài khoản thành công"]);

    }
    public function getDelete($id){
        $user_current=Auth::user()->id;
        $user=User::find($id);
    	if($id==1||($user_current!=1 && $user->level==1)){
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>"Không thể xóa được"]);
        }else{
            $user->delete($id);
            return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Xóa thành công"]);
        }
    }
    public function getEdit($id){
        $data=User::find($id);
        if((Auth::user()->id!=1) && ($id==1 || ($data->level==1 && (Auth::user()->id!=$id)))){
            return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>"Không thể sửa được"]);
        }
        return view('admin.user.edit',compact('data','id'));
    }
    public function postEdit($id,Request $request){
        $user=User::find($id);
    	if($request->txtPass){
            $this->validate($request,
                [
                    'txtRePass'=>'same:txtPass'
                ],
                [   
                    'txtRePass.same'=>'Hai mật khẩu phải trùng nhau'
                ]);
            $user->password=Hash::make($user->txtPass);
        }
            $user->sdt=$request->txtSdt;
            $user->email=$request->txtEmail;
            $user->diachi=$request->txtDiachi;
            $user->level=$request->rdoLevel;
            $user->remember_token=$request->_token;
            $user->save();
            return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Cập nhật thành công"]);
    }
     
    public function Logout()
    {
        Auth::logout();
        return redirect()->to('auth/login');
    }

}
