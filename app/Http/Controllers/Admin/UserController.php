<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Helper\Functions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User as MainModel;
use App\Models\Role;
use Session;

class UserController extends AdminController
{
    protected $pathView = "admin.core.";

    protected $resize = [
        'thumbnail' => ['width' => 100],
        // 'standard' => ['width' => 100],
    ];

    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Email', 'name' => 'email', 'type' => 'email'],
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Password', 'name' => 'password', 'type' => 'password'],
                ['label' => 'Re Password', 'name' => 'password_confirmation', 'type' => 'password'],
                ['label' => 'Role', 'name' => 'id_role', 'type' => 'multipleSelect', 'modal' => Role::class],
                ['label' => 'Avatar', 'name' => 'picture', 'type' => 'file'],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox']
            ]
        ]
    ];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Avatar', 'name' => 'picture', 'type' => 'picture'],
        ['label' => 'Role', 'name' => 'role', 'type' => 'role'],
        ['label' => 'Status', 'name' => 'status', 'type' => 'status'],
        ['label' => 'Created At', 'name' => 'created_at', 'type' => 'dateFormat'],
        // ['label' => 'Updated At', 'name' => 'updated_at', 'type' => 'dateFormat']
    ];

    protected $removeRedundant = ['_token','password_confirmation', 'id_role'];
    public function __construct(){
        //Get name of Controller
        $getControllerName = (new \ReflectionClass($this))->getShortName();
        $shortController = Functions::getModelName($getControllerName);
        $this -> folderUpload = $shortController;
        $this -> controllerName = $shortController;
        view()->share("shortController", $shortController);
        view()->share("controllerName",$this -> controllerName);
        view()->share("folderUpload", $this -> folderUpload);
        view()->share("fieldForm", $this -> fieldForm);
        view()->share("fieldList", $this -> fieldList);
        $this -> model = new MainModel();
    }

    public function store(Request $request){

        $this -> validateUser($request);
        $data = $this -> getData( $request -> all() );


        foreach ($data as $key => $value){
            if(is_object($value)){
                $value = $this -> uploadImage($value);
            }
            if($key == "password"){
                $value = Hash::make($value);
            }
            $this -> model -> $key = $value;
        }

        $this -> model -> save();


        // X??? l?? v???i roles
        if(!empty($request -> id_role) && count($request -> id_role) > 0 ){
            $roles = $request -> id_role;
            $role = [];
            foreach ($roles as $r){
                if( is_numeric($r) ){
                    $role[] = $r;
                }
            }
            $this -> model -> roles() -> attach($role);
        }
        else{
            $guest = Role::where("name", "Guest")->first();

            $role[] = $guest -> id;

            $this -> model -> roles() -> attach($role);
        }

        Session::flash("action_success","T???o m???i t??i kho???n th??nh c??ng");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }

    public function update(Request $request, $id){
        $this -> validateUserUpdate($request);
        $record = $this -> model -> find($id);
        $data = $this -> getData( $request -> all() );
        foreach ($data as $key => $value){
            if(is_object($value)){
                $this -> deleteImage($record -> $key);
                $value = $this -> uploadImage($value);
            }

            if($key == "password"){
                $value = Hash::make($value);
            }

            $record -> $key = $value;
        }

        $record -> save();

        // X??? l?? v???i roles
        if(isset($request -> id_role) && count($request -> id_role) > 0 ){
            $roles = $request -> id_role;
            $role = [];
            foreach ($roles as $r){
                if( is_numeric($r) ){
                    $role[] = $r;
                }
            }

            $record -> roles() -> sync($role);
        }

        Session::flash("action_success","C???p nh???t t??i kho???n th??nh c??ng");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }

    public function validateUser(Request $request){
        $request -> validate([
            'email' => 'bail|required|unique:users,email',

            'name' => 'required',
            //confirmed s??? ki???m tra 2 input name="password" v?? "password_confirmed" ??? TrimStrings.php trong middleware
            'password' => 'required|min:8|confirmed',
        ]);
    }

    public function validateUserUpdate(Request $request){
        $request -> validate([
            'email' => 'bail|required|',
            'name' => 'required',
        ]);
    }

}
