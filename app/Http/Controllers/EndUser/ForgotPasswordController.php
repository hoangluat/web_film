<?php 
  
namespace App\Http\Controllers\EndUser;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgotPasswordForm()
      {
         return view('enduser.pages.Auth.forgotPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgotPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
        $to_email =  $request->email;
          Mail::send('enduser.pages.Mail.forgotPassword', ['token' => $token], function($message) use($to_email){
              $message->to($to_email)->subject('Mail từ hệ thống !');
              $message->from($to_email,"Veryfying Resset Mail");
          });
  
          return back()->with('message', 'Vui lòng kiểm tra mail của bạn');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('enduser.pages.Auth.ResetPassword', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
        //   dd($request->all());
          $request->validate([
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where(    
                                'token' , $request->token_reset
                              )
                              ->first();
            
        // dd($updatePassword);
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $updatePassword->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/dang-nhap')->with('message', 'Mật khẩu của bạn đã được thay đổi');
      }
}