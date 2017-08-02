@extends('user.master')
@section('description','Trang chủ')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/'.$detail->image) !!}">
                <img src="{!! asset('resources/upload/'.$detail->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach($image as $item_images)
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/detail/'.$item_images->image) !!}">
                <img  src="{!! asset('resources/upload/detail/'.$item_images->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/'.$detail->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach($image as $item_images)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/detail/'.$item_images->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone">{!! $detail->name !!}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>{!! number_format($detail->price,"0",",",".") !!}</div>
              </div>
              <ul class="productpagecart">
                <li><a class="cart" href="#">Add to Cart</a>
                </li>
              </ul>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Description</a>
                  </li>
                  <li><a href="#specification">Tags</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <h2>{!! $detail->keywords!!}</h2>
                      {!! $detail->intro !!}
                     <br>
                    
                  </div>
                  <div class="tab-pane" id="specification">
                    {!! $detail->content !!}
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
      @foreach($product_cate as $item_product)
        <li class="span3">
          <a class="prdocutname" href="{!! URL::route('chitietsanpham',[ $item_product->id, $item_product->alias]) !!}">{!! $item_product->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="{!! URL::route('chitietsanpham',[ $item_product->id, $item_product->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_product->image) !!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!! number_format($item_product->price,"0",",",".") !!}</div>
                <div class="priceold">$5000.00</div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
        
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
</div>
@stop