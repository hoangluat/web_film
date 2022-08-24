<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Kindoffilms;
use Illuminate\Http\Request;
use App\Models\Typefilms;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Films;

class CinemaFilmController extends Controller
{
    protected $pathView = "enduser.pages.Films.";
   
    public function cinemaFilm()
    {
        
        $typeList = Typefilms::all();
        
        $kindFilms = Kindoffilms::all();
       
        $years = Films::distinct('year')->pluck('year');
       
        $cinemaFilm  = Kindoffilms::where('slug', 'phim-moi')->first();
       
        $films  = $cinemaFilm->films()->paginate(20);
        

        return view(
            $this->pathView . "searchFilms",
            compact(  "kindFilms", "typeList", "years",  "films","cinemaFilm")
        );
       

    }
}
