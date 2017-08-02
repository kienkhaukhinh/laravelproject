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
          <div class="sidewidt">
            <h2 class="heading2"><span>Sản phẩm cùng loại/span></h2>
            <ul class="nav nav-list categories">
            @foreach($menu_cate as $cate_item)
              <li>
                <a href="{!! URL::route('loaisanpham',[$cate_item->id,$cate_item->alias]) !!}">{!! $cate_item->name !!}</a>
              </li>
            @endforeach
            </ul>
          </div>
         <!--  Best Seller -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Sản phẩm nổi bật</span></h2>
            <ul class="bestseller">
              @foreach($feature as $product_feature)
              <li>
                <img width="50" height="50" src="{!! asset('resources/upload/'.$product_feature->image) !!}" alt="product" title="product">
                <a class="productname" href="{!! URL::route('chitietsanpham',[$product_feature->id,$product_feature->alias]) !!}">{!! $product_feature->name !!}</a>
                <span class="procategory">{!! $cate_parent_name->name !!}</span>
                <span class="price">{!! number_format($product_feature->price,"0",",",".") !!}</span>
              </li>
            @endforeach
              
            </ul>
          </div>
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Sản phẩm mới nhất</span></h2>
            <ul class="bestseller">
             @foreach($latest as $product_latest)
              <li>
                <img width="50" height="50" src="{!! asset('resources/upload/'.$product_latest->image) !!}" alt="product" title="product">
                <a class="productname" href="{!! URL::route('chitietsanpham',[$product_latest->id,$product_latest->alias]) !!}">{!! $product_latest->name !!}</a>
                <span class="procategory">{!! $cate_parent_name->name !!}</span>
                <span class="price">{!! number_format($product_latest->price,"0",",",".") !!}</span>
              </li>
            @endforeach
            </ul>
          </div>
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
                    @foreach($product_cate as $item)
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
                  <div class="pagination pull-right">
                    <ul>
                      @if($product_cate->currentPage() != 1)
                      <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1)) !!}">Prev</a>
                      </li>
                      @endif
                      @for($i=1 ; $i<=$product_cate->lastPage(); $i++)
                      <li class="{!! ($product_cate->currentPage()==$i) ? 'active' : '' !!}">
                        <a href="{!! str_replace('/?','?',$product_cate->url($i)) !!}">{!! $i !!}</a>
                      </li>
                      @endfor
                      @if($product_cate->currentPage() != $product_cate->lastPage())
                      <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1)) !!}">Next</a>
                      </li>
                      @endif
                    </ul>
                  </div>
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