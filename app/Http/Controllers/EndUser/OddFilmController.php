<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Kindoffilms;
use Illuminate\Http\Request;
use App\Models\Typefilms;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Films;

class OddFilmController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
    public function oddFilm()
    {
       
        $typeList = Typefilms::all();
       
        $kindFilms = Kindoffilms::all();
        $years = Films::distinct('year')->pluck('year');
       

        $phimle  = Kindoffilms::where('slug','phim-le')->first();

        $phimbo  = Kindoffilms::where('slug','phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();

        $oddFilm = Kindoffilms::where('slug', 'phim-le')->first();
        
        $films  = $oddFilm->films()->paginate(20);
        // dd($films);

        return view(
            $this->pathView . "searchFilms",
            compact(  "kindFilms", "typeList", "years",  "films","oddFilm","oddmovie" ,"seriesmovie")
        );
    }
}
