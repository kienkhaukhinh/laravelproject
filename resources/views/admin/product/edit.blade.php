@extends('admin.master')
@section('content')
<style type="text/css">
    #del_img{
        position: relative; top: -220px; right: -280px;
    }
    #hinh{
        margin-top: 30px;
    }
    #addImages{
        margin-top: 30px;
    }
    #insert{
        margin-top: 20px;
    }
</style>
                <form action="{!! route('admin.product.postEdit',$product['id']) !!}" method="POST" name="frmEditProduct" enctype="multipart/form-data">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.blocks.checkerrors')
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"></input>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="cbbCateParent">
                                    <option value="0">Please Choose Category</option>
                                    <?php cate_parent($cate,0,"--",$product->cate_id); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" value="{!! old('txtName',isset($product) ? $product->name : null) !!}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" value="{!! old('txtPrice',isset($product) ? $product->price : null) !!}" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtContent',$product->intro) !!}</textarea>
                                <script type="text/javascript">ckeditor('txtIntro')</script>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',$product->content) !!}</textarea>
                                <script type="text/javascript">ckeditor('txtContent')</script>
                            </div>
                            <div class="form-group">
                                <label>Image Current</label>
                                <img src="{!! asset('resources/upload/'.$product->image) !!}" class="img">
                                <input type="hidden" name="img_current" value="{!! $product->image !!}"></input>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords',isset($product) ? $product->keywords : null) !!}" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($product) ? $product->description : null) !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        @foreach($product_img as $key => $item)
                            <div class="form-group" id="{!! $key !!}">
                                <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" class="img_detail" id="{!! $key !!}" idHinh="{!! $item['id'] !!}">
                                <a href="javascript:void(0)" type="button" id="del_img" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>
                        @endforeach
                            <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                            <div id="insert"></div>
                    </div>
                    </form>
@stop