<?php

namespace App\Http\Controllers\Admin;

use App\Models\Listfilms as MainModel;
use App\Helper\Functions;
use App\Http\Controllers\AdminController;
use App\Models\Films;
use App\Models\Kindoffilms;
use App\Models\Nationals;
use App\Models\Typefilms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListfilmsController 
{
    protected $pathView = "admin.core.";


    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Episode(HD)', 'name' => 'episode', 'type' => 'text'],
                ['label' => 'IFrame Film', 'name' => 'iframefilm', 'type' => 'text'],
                ['label' => 'Kind Of Film', 'name' => 'kindoffilm_id', 'idajax'  => 'seclect-kindof' ,'type' => 'select', 'modal' => Kindoffilms::class],
                ['label' => 'Films', 'name' => 'film_id',   'idajax'  => 'seclect-films' ,'type' => 'select', 'modal' => Films::class],

            ]
        ],
    ];

    protected $removeRedundant = ["_token","kindoffilm_idShow","film_idShow"];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Episode', 'name' => 'episode', 'type' => 'text'],
        ['label' => 'IFrame Film', 'name' => 'iframefilm', 'type' => 'text'],
        ['label' => 'Kind Of Film', 'name' => 'kindoffilm_id', 'type' => 'foreign', 'modal' => \App\Models\Kindoffilms::class],
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

    public function index(){
        if(isset($_GET['film'])){
            $filmID = $_GET['film'];
        }
        $data = $this -> model -> where('film_id',$filmID) -> paginate(5);
        return view($this -> pathView . "index",compact("data"));
    }

    public function create(){
        if(isset($_GET['filmID'])){
            $filmID = $_GET['filmID'];
        }
        $singleRecordFilm = Films::where('id',  $filmID)->first();
        // dd($film);
        return view("admin.listfims.add",compact("singleRecordFilm"));
    }
    public function store(Request $request){
        // dd($request->all());
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




        Session::flash("action_success", "Thêm mới thành công");
        return redirect() -> route("admin." . $this -> controllerName . ".index",["film" => $data['film_id'] ]);
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

    public function delete($id){
        $record = $this -> model -> find($id);
        $record -> delete();
        if($record){
            return response() -> json([
                "code" => 200,
                "message" => "Delete success"
            ],200);
        }
        else{
            return response() -> json([
                "code" => 500,
                "message" => "Cant delete this record"
            ], 500);
        }
    }

    public function getData($request){
        $data = [];

        $keyArray = [];

        foreach($request as $key => $value){
            $keyArray[] = $key;
        }

        foreach ($this -> fieldForm as $key => $value){
            $item = $value["items"];
            foreach ($item as $_key => $v){
                $name = $v["name"];
                if(in_array($name, $keyArray)){
                    $data[$name] = $request[$name];
                }
            }

        }
        return array_diff_key($data, array_flip($this->removeRedundant));
    }

    public function getFilms($id){
        $films = Films::where('kindoffilm_id' ,$id)->get();
        echo "<option value> Chọn Film đi nào nhóc  </option>";
        foreach($films as $item){
            echo "<option value=".$item->id.">$item->name</option>" ;
        }
    }
}

