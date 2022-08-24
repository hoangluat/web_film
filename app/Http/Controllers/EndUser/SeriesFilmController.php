<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Kindoffilms;
use Illuminate\Http\Request;
use App\Models\Typefilms;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Films;

class SeriesFilmController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
   
    public function seriesFilm()
    {
        
        $typeList = Typefilms::all();
        
        $kindFilms = Kindoffilms::all();
       
        $years = Films::distinct('year')->pluck('year');

        $phimle  = Kindoffilms::where('slug','phim-le')->first();

        $phimbo  = Kindoffilms::where('slug','phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();
       
        $seriesFilm = Kindoffilms::where('slug', 'phim-bo')->first();
       
        $films  = $seriesFilm->films()->paginate(20);
        

        return view(
            $this->pathView . "searchFilms",
            compact(  "kindFilms", "typeList", "years",  "films","seriesFilm" ,"oddmovie" ,"seriesmovie")
        );
       

    }
}
