@extends('user.master')
@section('description','Trang loại sản phẩm')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Trang chủ</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Loại sản phẩm</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <!--  Must have -->  
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
              <li>
                <img src="img/product1.jpg" alt="" />
              </li>
              <li>
                <img src="img/product2.jpg" alt="" />
              </li>
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                    @foreach($product_search as $item)
                    <li class="span3">
                      <a class="prdocutname" href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="{!! URL::route('chitietsanpham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="{!! URL::route('muahang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">{!! number_format($item->price,"0",",",".") !!}</div>
                            <div class="priceold">$5000.00</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@stop