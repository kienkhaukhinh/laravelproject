<!-- Featured Product-->
@extends('user.master')
@section('description','Trang chủ')
@section('content')
<div id="maincontainer">
  <!-- Slider Start-->
  @include('user.blocks.slider')
  <!-- Slider End-->
  
  <!-- Section Start-->
  @include('user.blocks.info')
  <!-- Section End-->
  
  <!-- Featured Product-->
  <section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản phẩm nổi bật</span><span class="subtext">Các sản phẩm chất lượng</span></h1>
      <ul class="thumbnails">
      @foreach($feature as $item_1)
        <li class="span3">
          <a class="prdocutname" href="{!! URL::route('chitietsanpham',[$item_1->id,$item_1->alias]) !!}">{!! $item_1->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">SALE</span>
            <a href="{!! URL::route('chitietsanpham',[$item_1->id,$item_1->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_1->image) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! URL::route('muahang',[$item_1->id,$item_1->alias]) !!}" class="productcart">Thêm giỏ hàng</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item_1->price,"0",",",".") !!}</div>
                <div class="priceold"></div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
  <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản phẩm mới nhất</span><span class="subtext"> Các sản phẩm mới nhất</span></h1>
      <ul class="thumbnails">
        @foreach($latest as $item_2)
        <li class="span3">
          <a class="prdocutname" href="{!! URL::route('chitietsanpham',[$item_2->id,$item_2->alias]) !!}">{!! $item_2->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">SALE</span>
            <a href="{!! URL::route('chitietsanpham',[$item_2->id,$item_2->alias]) !!}"><img class="img-product" alt="" src="{!! asset('resources/upload/'.$item_2->image) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! URL::route('muahang',[$item_2->id,$item_2->alias]) !!}" class="productcart">Thêm giỏ hàng</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item_2->price,"0",",",".") !!}</div>
                <div class="priceold"></div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </section>
</div>
  @stop