<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;

use App\Product;

use App\Cate;

use App\ProductImage;

use File;

use Auth;

use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
  public function getList(){
      $data=Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get();
      return view('admin.product.list',compact('data'));
    }
    public function getAdd(){
      $cate_id=Cate::select('id','name','parent_id')->get()->toArray();
      return view('admin.product.add',compact('cate_id'));
    }
    public function getEdit($id){
      $product_img=Product::find($id)->pImages->toArray();
      $product=Product::find($id);
      $cate=Cate::select('id','name','parent_id')->get();
      return view('admin.product.edit',compact('product','product_img','cate'));
    }
    public function postEdit(Request $request,$id){
      $product = Product::find($id);
      $product->name=$request->txtName;
      $product->alias=changeTitle($request->txtName);
      $product->price=$request->txtPrice;
      $product->intro=$request->txtIntro;
      $product->content=$request->txtContent;
      $product->keywords=$request->txtKeywords;
      $product->description=$request->txtDescription;
      $product->user_id=Auth::user()->id;
      $product->cate_id=$request->cbbCateParent;

      $img_current='resources/upload/'.$request->img_current;
      if(!empty($request->file('fImages'))){
        $file_name=$request->file('fImages')->getClientOriginalName();
        $product->image=$file_name;
        $request->file('fImages')->move('resources/upload/',$file_name);
        if(File::exists($img_current)){
          File::delete($img_current);
        } else{
          echo "Khong co file";
        }
      }
      $product->save();

      if(!empty($request->file('fEditDetail'))){
        foreach ($request->file('fEditDetail') as $file) {
          $product_img= new ProductImage;
          if(isset($file)){
          $product_img->image=$file->getClientOriginalName();
          $product_img->product_id=$id;
          $file->move('resources/upload/detail',$file->getClientOriginalName());
          $product_img->save();
          }
        }
      }
      return redirect()->route('admin.product.getList')->with(['flash_message'=>'Success !!!','flash_level'=>'success']);
    }
    public function getDelImg($id,Request $request){
      if($request->ajax()){
        $idHinh=(int)$request->get('idHinh');
        $image_detail=ProductImage::find($idHinh);
        if(!empty($image_detail)){
          $img='resources/upload/detail/'.$image_detail->image;
          if(File::exists($img)){
            File::delete($img);
          }
          $image_detail->delete($id);
        }
        return "OK";
      }
    }
    public function getDelete($id){
      $product_detail=Product::find($id)->pImages;
      foreach($product_detail as $val){
        File::delete('resources/upload/detail/'.$val->image);
      }
      $product=Product::find($id);
      File::delete('resources/upload/'.$product->image);
      $product->delete($id);
      return redirect()->route('admin.product.getList')->with(['flash_message'=>'Success !!!','flash_level'=>'success']); 
    }
    public function postAdd(ProductRequest $product_request){
      $file_name=$product_request->file('fImages')->getClientOriginalName();
      $product= new Product;
      $product->name=$product_request->txtName;
      $product->alias=changeTitle($product_request->txtName);
      $product->price=$product_request->txtPrice;
      $product->intro=$product_request->txtIntro;
      $product->content=$product_request->txtContent;
      $product->image=$file_name;
      $product->keywords=$product_request->txtKeywords;
      $product->description=$product_request->txtDescription;
      $product->user_id=Auth::user()->id;
      $product->cate_id=$product_request->cbbCateParent;
      $product_request->file('fImages')->move('resources/upload/',$file_name);
      $product->save();
      $product_id=$product->id;
      if($product_request->hasFile('fProductDetail')){
      foreach($product_request->file('fProductDetail') as $file){
        $product_img= new ProductImage();
        if(isset($file)){
          $product_img->image=$file->getClientOriginalName();
          $product_img->product_id=$product_id;
          $file->move('resources/upload/detail/',$file->getClientOriginalName());
          $product_img->save();
        }
      }
      }
      return redirect()->route('admin.product.getList')->with(['flash_message'=>'Success !!!','flash_level'=>'success']);
    }
}
