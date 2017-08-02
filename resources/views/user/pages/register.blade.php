@extends('user.master')
@section('description','Trang chủ')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Đăng ký tài khoản khách hàng</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Đăng ký tài khoản khách hàng</span><span class="subtext">Đăng ký thành viên để được phục vụ tốt nhất</span></h1>
          @include('admin.blocks.checkerrors')
          <form class="form-horizontal" method="POST" action="">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"></input>
            <h3 class="heading3">Thông tin cá nhân</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Họ tên:</label>
                  <div class="controls">
                    <input type="text" name="txtHoten" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Tên đăng nhập:</label>
                  <div class="controls">
                    <input type="text" name="txtUser" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input type="text" name="txtEmail"  class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Số điện thoại:</label>
                  <div class="controls">
                    <input type="text" name="txtSdt" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Địa chỉ gửi hàng:</label>
                  <div class="controls">
                    <input type="text" name="txtDiachi" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">Mật khẩu của bạn</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Mật khẩu:</label>
                  <div class="controls">
                    <input type="password" name="txtPass"  class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Nhập lại mật khẩu:</label>
                  <div class="controls">
                    <input type="password" name="txtRePass" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="pull-right">
              <label class="checkbox inline">
                <input type="checkbox" value="option2" >
              </label>
              I have read and agree to the <a href="#" >Privacy Policy</a>
              &nbsp;
              <input type="Submit" class="btn btn-orange" value="Đăng ký">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>
      </div>
    </div>
  </section>
</div>
@stop