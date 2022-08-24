<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Kindoffilms;
use Illuminate\Http\Request;
use App\Models\Typefilms;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

use App\Models\Films;

class TypeFilmController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
   
    public function showTypeList($keyword){
        $user_id = Auth::id();
      
        // $wishlist = Wishlist::where(['user_id' => $user_id])-> get();
        
        $typefilm = Typefilms::where('slug', $keyword)->first();
        $typeList = TypeFilms::all();
        $kindFilms = Kindoffilms::all();

        $phimle  = Kindoffilms::where('slug','phim-le')->first();
        $phimbo  = Kindoffilms::where('slug','phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();

        $years = Films::distinct('year')->pluck('year');
        $films = $typefilm->films()-> paginate(12);
        return view($this -> pathView . "searchFilms",
        compact("keyword", "films", "kindFilms" ,"typeList","years","oddmovie" ,"seriesmovie"));
    }

    
}



