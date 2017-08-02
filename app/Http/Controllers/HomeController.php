<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\User;
use Hash;
use DB;
use Mail;
use Cart;
use Session;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature=DB::table('products')->select('id','name','image','price','alias')->orderBy('price','DESC')->skip(0)->take(4)->get();
        $latest=DB::table('products')->select('id','name','image','price','alias')->orderBy('created_at','DESC')->skip(0)->take(4)->get();
        return view('user.pages.home',compact('feature','latest'));
    }
    public function loaisanpham($id){
        $product_cate=DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->paginate(3);
        $cate_parent_name=DB::table('cates')->select('name','parent_id')->where('id',$id)->first();
        $menu_cate=DB::table('cates')->select('id','name','alias')->where('parent_id',$cate_parent_name->parent_id)->get();
        $latest=DB::table('products')->select('id','name','image','price','alias')->where('cate_id',$id)->orderBy('created_at','DESC')->skip(0)->take(3)->get();
        $feature=DB::table('products')->select('id','name','image','price','alias')->where('cate_id',$id)->orderBy('price','DESC')->skip(0)->take(4)->get();
        return view('user.pages.category',compact('product_cate','cate_parent_name','menu_cate','latest','feature'));
    }
    public function chitietsanpham($id){
        $detail=DB::table('products')->where('id',$id)->first();
        $image=DB::table('product_images')->select('id','image')->where('product_id',$detail->id)->get();
        $product_cate=DB::table('products')->where('cate_id',$detail->cate_id)->where('id','<>',$id)->skip(0)->take(4)->get();
        return view('user.pages.product',compact('detail','image','product_cate'));
    }
    public function getLienhe(){
        return view('user.pages.contact');
    }
    public function postLienhe(Request $request){
        $data=['hoten'=>$request->name,'tinnhan'=>$request->message];
        Mail::send('auth.emails.blanks',$data,function($msg){
            $msg->from('duy.itk14.sgu@gmail.com','Duy Trần');
            $msg->to('duy.itk14.sgu@gmail.com','Duy')->subject('Đây là mail');
        });
        echo "<script>
            alert('Cám ơn bạn đã đóng góp ý kiến. Chúng tôi sẽ phản hồi sớm');
            window.location = '".url('/')."';
        </script>";
    }

    public function muahang($id){
        $product_buy=DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>array('img'=>$product_buy->image)));
        $content=Cart::content();
        Session::put('count',Cart::count(false));
        return redirect()->back();
    }
    public function giohang(){
        $content=Cart::content();
        $total=Cart::total();
        Session::put('count',Cart::count(false));
        return view('user.pages.shopping',compact('content','total'));
    }
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    public function capnhat(Request $request){
        if($request->ajax()){
            $id=$request->get('id');
            $qty=$request->get('qty');
            Cart::update($id,$qty);
            echo "ok";
        }
    }
    public function timkiem(Request $request){
        $cate_search=DB::table('cates')->select('parent_id')->where('name','LIKE','%'.$request->txtSearch.'%')->first();
        $product_search=DB::table('products')->where('name','LIKE','%'.$request->txtSearch.'%')->orwhere('cate_id',$cate_search->parent_id)->get();
        Session::put('search',$request->txtSearch);
        return view('user.pages.search',compact('product_search'));
    }
    public function getDangky(){
        return view('user.pages.register');
    }
    public function postDangky(UserRequest $request){
        $user=new User();
        $user->hoten=$request->txtHoten;
        $user->username=$request->txtUser;
        $user->password=Hash::make($request->txtPass);
        $user->email=$request->txtEmail;
        $user->sdt=$request->txtSdt;
        $user->diachi=$request->txtDiachi;
        $user->level=2;
        $user->remember_token=$request->_token;
        $user->save();
        return redirect()->route('getDangnhap')->with(['flash_level'=>'success','flash_message'=>"Đăng ký tài khoản thành công"]);

    }
    public function getDangnhap(){
        return view('user.pages.login');
    }

    public function postDangnhap(LoginRequest $request){
        $login=array(
            'username' => $request->txtUsername,
            'password' => $request->txtPass,
            'level'    => 2
            );
        if(Auth::attempt($login,$remember=true)){
            return redirect()->route('getDangky');
        }else{
            echo 'Sai tên đăng nhập hoặc mật khẩu';
            return redirect()->back()->with(['flash_message'=>'Sai tên đăng nhập hoặc mật khẩu','flash_level'=>'danger']);
        }
    }
}
