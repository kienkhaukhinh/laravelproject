@extends('admin.master')
@section('content')
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.blocks.checkerrors')
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"></input>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="txtHoten" placeholder="Vui lòng nhập vào họ tên của bạn" value="{!! old('txtHoten') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input class="form-control" name="txtUser" placeholder="Vui lòng nhập vào tên tài khoản" value="{!! old('txtUser') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Vui lòng nhập vào mật khẩu" value="{!! old('txtPass') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Vui lòng nhập lại mật khẩu" value="{!! old('txtRePass') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="txtEmail" placeholder="Vui lòng nhập địa chỉ Email" value="{!! old('txtEmail') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="txtSdt" placeholder="Vui lòng nhập vào số điện thoại" value="{!! old('txtSdt') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiachi" placeholder="Vui lòng nhập vào địa chỉ nhà" value="{!! old('txtDiachi') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Phân quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm </button>
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        <form>
                    </div>
@stop