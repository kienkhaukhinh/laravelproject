<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CateRequest;
use App\Cate;
class CateController extends Controller
{
   	public function getAdd(){
   		$parent=Cate::select('id','name','parent_id')->get()->toArray();
   		return view('admin.cate.add',compact('parent'));
   	}
   	public function getList(){
   		$data=Cate::select('id','name','parent_id','created_at')->orderBy('id','DESC')->get()->toArray();
   		return view('admin.cate.list',compact('data'));
   	}
   	public function getDelete($id){
   		$parent=Cate::where('parent_id',$id)->count();
   		if($parent==0){
	   		$cate=Cate::find($id);
	   		$cate->delete($id);
	   		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Success !!!','flash_level'=>'success']);
   		}else{
   			echo "<script type='text/javascript'>
   					alert('Không thể xóa được');
   					window.location='";
   					echo route('admin.cate.getList');
   				echo "'
   					</script>";
   		}
   	}
   	public function getEdit($id){
   		$data=Cate::find($id)->toArray();
   		$parent=Cate::select('id','name','parent_id')->get()->toArray();
   		return view('admin.cate.edit',compact('parent','data'));
   	}
   	public function postEdit(Request $request,$id){
   		$this->validate($request,
   				["txtCateName"=>'required'],
   				["txtCateName.required"=>"Vui lòng không bỏ trống tên loại"]
   			);
         $cate = Cate::find($id);
         $cate->name=$request->txtCateName;
         $cate->alias=changeTitle($request->txtCateName);
         $cate->order=$request->txtOrder;
         $cate->parent_id=$request->cbbCateParent;
         $cate->keywords=$request->txtKeywords;
         $cate->description=$request->txtDescription;
         $cate->save();
         return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Success !!!','flash_level'=>'success']);
   	}
   	public function postAdd(CateRequest $request){
   		$cate = new Cate;
   		$cate->name=$request->txtCateName;
   		$cate->alias=changeTitle($request->txtCateName);
   		$cate->order=$request->txtOrder;
   		$cate->parent_id=$request->cbbCateParent;
   		$cate->keywords=$request->txtKeywords;
   		$cate->description=$request->txtDescription;
   		$cate->save();
   		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Success !!!','flash_level'=>'success']);
   	}
}
