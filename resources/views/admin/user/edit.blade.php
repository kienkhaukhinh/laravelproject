@extends('admin.master')
@section('content')
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{!! route('admin.user.postEdit',$data->id) !!}" method="POST">
                        @include('admin.blocks.checkerrors')
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"></input>
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input class="form-control" name="txtUsername" value="{!! old('txtUsername',isset($data) ? $data->username : null) !!}" disabled />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu nhập lại</label>
                                <input type="password" class="form-control" name="txtRePass" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" value="{!! old('txtEmail',isset($data) ? $data->email : null) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="txtSdt" value="{!! old('txtSdt',isset($data) ? $data->sdt : null) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiachi" value="{!! old('txtDiachi',isset($data) ? $data->diachi : null) !!}" />
                            </div>
                            @if(Auth::user()->id != $id)
                            <div class="form-group">
                                <label>Cấp bậc</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" type="radio"
                                    @if($data->level==1)
                                        checked="checked"
                                    @endif
                                    >Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio"
                                    @if($data->level==2)
                                        checked="checked"
                                    @endif
                                    >Member
                                </label>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
@stop