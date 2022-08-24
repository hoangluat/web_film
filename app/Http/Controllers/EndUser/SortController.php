<?php

namespace App\Http\Controllers\EndUser;


use App\Models\Wishlist;
use App\Models\Films;
use App\Models\Kindoffilms;
use App\Models\Typefilms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class SortController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
    public function sort($model){
        // dd($model);
        $films = [];
        $sortType = $_GET['type'];
        $sortCat_id = $_GET['cat_id'];
        $sortYear = $_GET['year'];
        if($sortType == "" && $sortCat_id == "" && $sortYear == "" ){
            $films = $model->orderByRaw("RAND()")->paginate(20);
        }
        elseif ($sortType != '' && $sortCat_id == "" && $sortYear == "") {
            $kindFilm = Kindoffilms::where('slug', $sortType)->first();
            $films = $model->where('kindoffilm_id', $kindFilm->id)->paginate(12)->appends(request() -> query());
        }elseif ($sortType != '' && $sortCat_id != "" && $sortYear == "") {
            $kindFilm = Kindoffilms::where('slug', $sortType)->first();
            $typefilm = TypeFilms::where('slug', $sortCat_id)->first();
            $films = $typefilm->films()->where('kindoffilm_id', $kindFilm->id)->paginate(12)->appends(request() -> query());
        }
        elseif ($sortType == '' && $sortCat_id != "" && $sortYear == "") {
            $typefilm = TypeFilms::where('slug', $sortCat_id)->first();
            $films = $typefilm->films()->paginate(12)->appends(request() -> query());
        }
        elseif ($sortType == '' && $sortCat_id == "" && $sortYear != "") {

            $films = $model->where('year', $sortYear)->paginate(12)->appends(request() -> query());
        }
        elseif ($sortType == '' && $sortCat_id != "" && $sortYear != "") {
            $typefilm = TypeFilms::where('slug', $sortCat_id)->first();
            $films = $typefilm->films()->where('year', $sortYear)->paginate(12)->appends(request() -> query());
        }
        elseif ($sortType != '' && $sortCat_id == "" && $sortYear != "") {
            $kindFilm = Kindoffilms::where('slug', $sortType)->first();
            $films = $model->where([
                ['year', $sortYear],
                ['kindoffilm_id', $kindFilm->id]
            ])->paginate(12)->appends(request() -> query());
        }
        elseif ($sortType != '' && $sortCat_id != "" && $sortYear != "") {
            $kindFilm = Kindoffilms::where('slug', $sortType)->first();
            $typefilm = TypeFilms::where('slug', $sortCat_id)->first();
            $films = $typefilm->films()->where([
                ['year', $sortYear],
                ['kindoffilm_id', $kindFilm->id]
            ])->paginate(12)->appends(request() -> query());
        }
        return $films;
    }
    public function showSortList(){
        $user_id = Auth::id();
       
        $model = new Films();
        $typeList = Typefilms::all();
        $kindFilms = Kindoffilms::all();
        $phimle  = Kindoffilms::where('slug','phim-le')->first();
        $phimbo  = Kindoffilms::where('slug','phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();
        $years = Films::distinct('year')->pluck('year');
        if(isset( $_GET['type']) || isset( $_GET['cat_id']) || isset($_GET['year'])) {
            $films = $this -> sort($model);

        }else{
            $films = $model -> paginate(12);
        }
        

        return view($this -> pathView . "searchFilms",
            compact("films" ,"kindFilms","typeList","years","oddmovie" ,"seriesmovie"));
    }

}
