<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Kindoffilms;
use Illuminate\Http\Request;
use App\Models\Typefilms;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Films;

class YearFilmController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
    public function showYearList(Request $request){
        // dd($keyword);
        $user_id = Auth::id();

        // $wishlist = Wishlist::where(['user_id' => $user_id])-> get();
        if(isset($request['keyword'])){
            $keyword = $request['keyword'];
        }
       
        $typeList = TypeFilms::all();
        $kindFilms = Kindoffilms::all();
        $years = Films::distinct('year', $keyword)->pluck('year');
        // dd($keyword);
        $films = Films::where("year", "LIKE", "%" . $keyword . "%")-> paginate(12);
        
        return view($this -> pathView . "searchFilms",
        compact("keyword", "films", "kindFilms" ,"typeList","years"));
    }
}
