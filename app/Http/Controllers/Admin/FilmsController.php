<?php

namespace App\Http\Controllers\Admin;

use App\Models\Films as MainModel;
use App\Helper\Functions;
use App\Http\Controllers\AdminController;
use App\Models\Kindoffilms;
use App\Models\Nationals;
use App\Models\Typefilms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FilmsController extends AdminController
{
    protected $pathView = "admin.core.";

    protected $resize = [
        'thumbnail' => ['width' => 800],
        'standard' => ['width' => 100],
    ];

    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Director', 'name' => 'director', 'type' => 'text'],
                ['label' => 'Cast', 'name' => 'actor', 'type' => 'text'],
                ['label' => 'Duration', 'name' => 'duration', 'type' => 'text'],
                ['label' => 'Film View', 'name' => 'filmview', 'type' => 'text'],
                ['label' => 'Release Year', 'name' => 'year', 'type' => 'text'],
                ['label' => 'Desc', 'name' => 'description', 'type' => 'textarea'],
                ['label' => 'Trailer', 'name' => 'trailer', 'type' => 'text'],
                ['label' => 'Picture', 'name' => 'image', 'type' => 'file'],
                ['label' => 'Picture Banner', 'name' => 'imagebanner', 'type' => 'file'],
                ['label' => 'TTStatus', 'name' => 'ttstatus', 'type' => 'text'],
                ['label' => 'Session', 'name' => 'session', 'type' => 'text'],
                ['label' => 'Kind Of Film', 'name' => 'kindoffilm_id', 'type' => 'select', 'modal' => Kindoffilms::class],
                ['label' => 'Tags', 'name' => 'national_id', 'type' => 'multipleSelect', 'modal' => Nationals::class],
                ['label' => 'Tags', 'name' => 'typefilm_id', 'type' => 'multipleSelect', 'modal' => Typefilms::class],
            ]
        ],

        'seo_tab' => [
            'tab_label' => 'Meta',
            'items' => [
                ['label' => 'Slug', 'name' => 'slug', 'type' => 'slug']
            ]
        ]
    ];

    protected $removeRedundant = ["_token", "national_id","typefilm_id"];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Picture', 'name' => 'image', 'type' => 'picture'],
        ['label' => 'TTStatus', 'name' => 'ttstatus', 'type' => 'text'],
        ['label' => 'Kind Of Film', 'name' => 'kindoffilm_id', 'type' => 'foreign', 'modal' => \App\Models\Kindoffilms::class],
        ['label' => 'Thêm Tập', 'name' => 'ecapsode', 'type' => 'link'],
    ];

    public function __construct(){
        //Get name of Controller
        $getControllerName = (new \ReflectionClass($this))->getShortName();
        $shortController = Functions::getModelName($getControllerName);
        $this -> folderUpload = $shortController;
        $this -> controllerName = $shortController;
        view()->share("shortController", $shortController);
        view()->share("folderUpload", $this -> folderUpload);
        view()->share("controllerName",$this -> controllerName);
        view()->share("fieldForm", $this -> fieldForm);
        view()->share("fieldList", $this -> fieldList);
        $this -> model = new MainModel();
    }

    public function store(Request $request){
        //Gửi request sang hàm validateForm để xác thực
        $this -> validateForm($request);
        $data = $this -> getData($request -> all());
        //Gán các trường trong db bằng value
        if($data){
            foreach ($data as $key => $value){
                if( is_object($value) ){
                    $value = $this -> uploadImage($value);
                }
                if($key == "gallery"){
                    if( is_object($value[0]) ){
                        $value = $this -> uploadMultipleImage($value);
                    }
                }
                $this -> model -> $key = $value; //create
            }
        }

        $this -> model -> save(); //store

        // Xử lý với tags
        if( isset($request->typefilm_id)  && count($request->typefilm_id) > 0 ){
            $typefilm_id = $request->typefilm_id;
            $typefilms_id = [];
            foreach($typefilm_id as $k => $v){
                // Kiểm tra xem có phải là số hoặc chữ số hay không
                if(is_numeric ($v)){
                    $typefilms_id[] = $v;
                }
            }
            // attach(array);
            $this-> model -> typefilms() -> attach($typefilms_id);
        }

        if( isset($request->national_id)  && count($request->national_id) > 0 ){
            $national_id = $request->national_id;
            $nationals_id = [];
            foreach($national_id as $k => $v){
                // Kiểm tra xem có phải là số hoặc chữ số hay không
                if(is_numeric ($v)){
                    $nationals_id[] = $v;
                }
            }
            // attach(array);
            $this-> model -> nationals() -> attach($nationals_id);
        }


        Session::flash("action_success", "Thêm mới thành công");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }

    public function update(Request $request, $id){
        //dd($request ->all());
        $record = $this -> model -> find($id);

        $this -> validateForm($request);
        $data = $this -> getData($request -> all());

        foreach ($data as $key => $value){
            if(is_object($value)){
                $this -> deleteImage($record -> {$key});
                $value = $this->uploadImage($value);
            }
            if($key == "gallery" ){
                if( is_object($value[0]) ){
                    $value = $this -> uploadMultipleImage($value);
                    dd($value);
                }
            }
            $record[$key] = $value;
        }

        $record -> save();

        if(isset($request -> typefilm_id) && count($request -> typefilm_id) > 0)
        {
            $typefilm_id = $request -> typefilm_id;
            $typefilms_id = [];
            foreach ($typefilm_id as $key => $value){
                if(is_numeric($value)){
                    $typefilms_id[] = $value;
                }
            }

            $record -> typefilms() -> sync($typefilms_id);
        }

        if(isset($request -> national_id) && count($request -> national_id) > 0)
        {
            $national_id = $request -> national_id;
            $nationals_id = [];
            foreach ($national_id as $key => $value){
                if(is_numeric($value)){
                    $nationals_id[] = $value;
                }
            }

            $record -> nationals() -> sync($nationals_id);
        }

        Session::flash("action_success", "Sửa mới thành công");
        return redirect() -> route("admin." . $this -> controllerName . ".index");
    }
}

