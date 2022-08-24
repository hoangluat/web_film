<?php
namespace App\Http\Controllers\EndUser;

use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use File;

class ProfilesController extends Controller
{
    public function show()
    {
        return view('enduser/pages/Auth/profiles');
    }
    // public function Avata(Request $request){
    //     $this -> validateForm($request);
    //     $data = $this -> getData($request -> all());
    //     if($data){
    //         foreach ($data as $key => $value){
    //             if( is_object($value) ){
    //                 $value = $this -> uploadImage($value);
    //             }
    //             $this -> model -> $key = $value; //create
    //         }
    //         $this -> model -> save();    
    //     }
    // }
    public function updateAVT(Request $request){
        // dd($request->avater);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $this -> deleteImage($user->picture);
        $value = $this->uploadImage($request->avater);
        $user['picture'] = $value;
        $user -> save();
        return redirect() -> route('profiles.get');
    }

    public function uploadImage($imgObject){
        //Lấy đuôi ảnh
        // dd($imgObject);
        $typeFile = $imgObject -> getClientOriginalExtension();

        $randomFileName = Str::random(12) . '.' . $typeFile;

        //Tạo mới 1 resource
        $ImageResize = Image::make($imgObject);
        $path = public_path() . '/picture/user/' ;

        //Tự động tạo path mới với filesystem (use File)
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true);
        }

        $ImageResize -> save($path.$randomFileName);
        return $randomFileName;
    }

    public function deleteImage($imageName){
        $path = public_path() . "/picture/user/";

        $oldImage = $path.$imageName;


        if(isset($imageName) && file_exists($oldImage)){
            //Delete old imageName
            unlink($oldImage);
        }    
    }
}