<?php

namespace App\Http\Controllers\enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Typefilms;
use App\Models\Kindoffilms;

class SeriesController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
   
    public function showSeries($keyword){
        $user_id = Auth::id();
        $typefilm = Typefilms::where('slug', $keyword)->first();
        $typeList = TypeFilms::all();
        $kindFilms = Kindoffilms::all();
       
        $films = $typefilm->films()-> paginate(12);
        // dd($films);
        return view($this -> pathView . "filmdetail",
        compact("keyword", "films", "kindFilms" ,"typeList",));
    }
    
}
