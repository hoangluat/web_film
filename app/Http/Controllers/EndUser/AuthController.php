<?php

namespace App\Http\Controllers\EndUser;

use App\Models\User as MainModel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $pathView = "enduser.pages.Auth.";
    protected $model;
    protected $remove = ["_token", "password_confirmation","confirm_password"];


    public function __construct(){
        $this -> model = new MainModel();
    }

    public function login(){
        //Set intended url để lưu vào session previous url
        Redirect::setIntendedUrl(url()->previous());
        return view($this -> pathView . "login");
    }


    public function checkLogin(Request $request){
        Validator::make($request->all(),[
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:16',
        ],
            [
            'email.required' => 'Email người dùng không được để trống',
            'email.email' => 'Bạn phải đăng nhập bằng email',
            'password.required' => 'Bắt buộc phải nhập mật khẩu'
            ]
        )->validate();
        $email = $request -> email;
        $password = $request -> password;

        if( Auth::attempt(["email" => $email, "password" => $password ,"status" => 'active']) ){
            //dùng RouteServiceProvider để lấy session từ intended đã thêm
            return redirect() -> route("page.index");
        }
        else{
            return redirect() -> route("auth.login")->with('thongbao','Tài khoản or mật khẩu không chính xác');
        }
    }

    public function register(){
        return view($this -> pathView . "register");
    }

    public function checkRegister(Request $request){
        $this -> validateForm($request);

        $verification_code = time().uniqid(true);
        $data = $this -> getData($request -> all());

        foreach ($data as $key => $value){
            if($key == "password"){
                $value = Hash::make($value);
            }

            $this -> model -> $key = $value;
        }
        $this -> model -> verification_code  = $verification_code;
        $this -> model -> status = 'inactive';
        $this -> model -> save();
        $to_name = "Bộ Công An Quốc Gia";
        $to_email =  $request->email;
        $data = array("name" => "Mail từ hệ thống ","body" => "Đơn đặt hàng !" ,"password"  =>  $request->password ,"verification_code"  =>  $verification_code);
        Mail::send('enduser.pages.Mail.accountVerification',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Mail từ hệ thống English !');
            $message->from($to_email,$to_name);
        });
        return redirect() -> route("auth.login")->with("thongbaoMail" ,"Vui lòng kiểm tra email để kích hoạt");
    }

    public function verifyRegister($code){
        $user  = $this -> model ->where("verification_code" , $code) ->first();
        $user -> status = 'active';
        $user -> save();
        return redirect() -> route("auth.login");
    }

    public function logout(){
        Auth::logout();
        return redirect() -> route("auth.login");
    }

    public function getData($request){
        return array_diff_key($request, array_flip($this -> remove));
    }

    public function validateForm(Request $request){
        $validate = $request -> validate([
            // confirmed work khi name của input nhập lại mật khẩu có name là password_confirmation
            'name' => 'required',
            "email" => "required|unique:users,email",
            "password" => "required|min:6|max:15",
            'confirm_password' => 'required|same:password',
        ],[
            "required" => ":attribute không được để trống",
            "min" => ":attribute ít nhất 8 kí tự",
            "email" => ":attribute phải là kiểu email '@' ",
            "unique" => ":attribute đã tồn tại",
            "confirm_password"  => ":attribute xác thực không đúng",

        ],[
            "name" => "Tên",
            "password" => "Mật khẩu",
            "email" => "Email",
            "confirm_password"  => "Mật khẩu"
        ]);

        return $validate;
    }
}
