@extends('admin.master')
@section('content')
    <style type="text/css">
    .img_current{
        width: 150px;
    }
    .img_detail{
        width:200px,margin-bottom:20px;
    }
    </style>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.blocks.checkerrors')
                        <form action="{!! route('admin.cate.postEdit',$data['id']) !!}" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"></input>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="cbbCateParent">
                                    <option value="0">Please Choose Category</option>
                                    <?php cate_parent($parent,0,"--",$data['parent_id']); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="txtCateName" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}">
                            </div>
                            <div class="form-group">
                                <label>Category Order</label>
                                <input class="form-control" name="txtOrder" value="{!! old('txtOrder',isset($data) ? $data['order'] : null) !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Category Keywords</label>
                                <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords',isset($data) ? $data['keywords'] : null) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($data) ? $data['description'] : null) !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
@stop