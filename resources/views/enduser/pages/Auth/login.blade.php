@extends("enduser.layout")
@section("front_content")
<div id="main-content">
    <div id="content">
        @if (session('thongbaoMail'))
            @include("enduser.components.toastify")
        @endif
        <div class="container">
            <div class="main-content" id="user">
                <div>
                    <div class="login-register-container">
                        <form id="login-form" action="{{ route("auth.checkLogin") }}" method="post">

                            <div class="header"> <i class="fa fa-sign-in"></i> <span>Đăng nhập</span> </div>
                            <div class="form">
                                <div class="form-row">
                                    @csrf
                                    @if (session('thongbao'))
                                        <div class="alert alert-danger">{{ session('thongbao') }}</div>
                                    @endif

                                    @if (session('message'))
                                        <div class="alert alert-danger">{{ session('message') }}</div>
                                    @endif


                                    <div class="input relative"> <i class="fas fa-user"></i> <input
                                            placeholder="Tên tài khoản" id="username" name="email" type="text" maxlength="32" />
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="input relative"> <i class="fa fa-lock"></i> <input
                                            placeholder="Mật khẩu" id="password" name="password" type="password" maxlength="255" />
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="hide form-row"><span><input type="checkbox" id="remember" checked /> ghi
                                        nhớ đăng nhập</span></div>
                                <div class="form-row text-right"> <input class="btn btn-login btn-success"
                                        type="submit" value="Đăng nhập" /> 
                                </div>
                                <div class="form-row">
                                    <a href="{{route("forgotpass.get")}}" >Quên mật khẩu</a>
                                </div>
                                <div class="form-row"> <span>Bạn chưa có tài khoản ? <a href="{{route("auth.register")}}"
                                            class="btn btn-danger btn-sm">Đăng ký ngay</a></span> 
                                </div>  
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
