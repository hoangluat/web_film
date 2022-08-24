<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Helper\Functions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role as MainModel;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;

class RoleController extends AdminController
{
    protected $pathView = "admin.page.role.";

    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Role Name', 'name' => 'name', 'type' => 'text'],
            ]
        ],
    ];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Role Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Created At', 'name' => 'created_at', 'type' => 'dateFormat'],
        ['label' => 'Updated At', 'name' => 'updated_at', 'type' => 'dateFormat']
    ];

    protected $removeRedundant = ['_token'];
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
        view()->share("pathView", $this -> pathView);
        $this -> model = new MainModel();
    }

    public function store(Request $request){
        $this -> validateForm($request);
        $data = $this -> getData($request -> all());
        $permissions = [];
        foreach ($data as $key => $value){
            // Xử lý permissions
            if(is_array($value)){
                foreach ($value as $k => $v){
                    foreach ($v as $action => $on){
                        if($on == "on"){
                            $flag = true;
                        }else{
                            $flag = false;
                        }
                        $permissions[$k . "." . $action] = $flag;
                    }
                }
                $value = json_encode($permissions);
            }

            $this -> model -> $key = $value;
        }

        $this -> model -> save();

        Session::flash("action_success", "Thêm mới role với các permission thành công");
        return redirect() -> route("admin.role.index");
    }

    public function update(Request $request, $id){
        $record = $this -> model -> find($id);
        $this -> validateForm($request);
        $data = $this -> getData($request -> all());
        $permissions = [];
        foreach ($data as $key => $value){
            // Xử lý permissions
            if(is_array($value)){
                foreach ($value as $k => $v){
                    foreach ($v as $action => $on){
                        if($on == "on"){
                            $flag = true;
                        }
                        else{
                            $flag = false;
                        }
                        $permissions[$k . "." . $action] = $flag;
                    }
                }
                $value = json_encode($permissions);
            }

            $record -> $key = $value;
        }

        $record -> save();

        Session::flash("action_success", "Sửa role thành công");
        return redirect() -> route("admin.role.index");
    }

    public function getData($request){
        if($request['_token']) {
            unset($request['_token']);
        }
        return $request;
    }


}
