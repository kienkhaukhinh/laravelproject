@extends('admin.master')
@section('content')
                <form action="{!! route('admin.product.postAdd') !!}" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.blocks.checkerrors')
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"></input>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="cbbCateParent">
                                    <option value="">Please Choose Category</option>
                                    <?php cate_parent($cate_id,0,"--",old('cbbCateParent')); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" value="{!! old('txtName') !!}" placeholder="Please Enter Product Name" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" value="{!! old('txtPrice') !!}" placeholder="Please Enter Price" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages" value="{!! old('fImages') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords') !!}" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>  
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                            @for($i=1;$i<=10;$i++)
                                <div class="form-group">
                                    <label>Image Product Detail {!! $i !!}</label>
                                    <input type="file" name="fProductDetail[]"></input>
                                </div>
                            @endfor
                    </div>
                </form>
@stop