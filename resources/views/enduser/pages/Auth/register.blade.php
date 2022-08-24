@extends("enduser.layout")
@section("front_content")
<div id="main-content">
    <div id="content">
        <div class="container">
            <div class="main-content" id="user">
                <div>
                    <div class="login-register-container">
                        {{-- <script src='../../www.google.com/recaptcha/api327f.js?hl=vi'></script> --}}
                        <form id="register-form" action="{{ route("auth.checkRegister") }}" method="post" >
                            @csrf

                            <div class="header"> <i class="fa fa-sign-in"></i> <span>Đăng ký tài khoản</span> </div>
                            <div class="form">
                                <div class="form-row"> </div>
                                <div class="form-row">
                                    <div class="input relative"> <i class="fa fa-user"></i> <input
                                            placeholder="Tên tài khoản (không dấu)" id="username" name="name"
                                            type="text" maxlength="32" /> </div>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="input relative"> <i class="fa fa-user"></i> <input
                                            placeholder="Email (không dấu)" id="username" name="email"
                                            type="text" maxlength="32" /> </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="input relative"> <i class="fa fa-lock"></i> <input
                                            placeholder="Mật khẩu (6-15 kí tự)" id="password" type="password"
                                            name="password" maxlength="255" /> </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="input relative"> <i class="fa fa-lock"></i> <input
                                            placeholder="Xác nhận mật khẩu" title="Nhập lại mật khẩu trên"
                                            id="confirm_password" name="confirm_password" type="password" /> </div>
                                    @error('confirm_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-row text-right"> <button class="btn btn-register btn-success"
                                        type="submit"  >Đăng Ký</button> </div>
                                <div class="form-row"> <span>Bạn đã tài khoản ? <a href="{{route("auth.login")}}"
                                            class="btn btn-primary btn-sm">Đăng nhập</a></span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right-content"> </div>
            </div>
        </div>
    </div>
</div>
@stop
