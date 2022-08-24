<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Films;
use App\Models\Kindoffilms;
use App\Models\Listfilms;
use App\Models\Typefilms;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmsController extends Controller
{
    protected $pathView = "enduser.pages.Films.";

    public function filmdetail($slug)
    {
        $user_id = Auth::id();
        $wishlist = Wishlist::where(['user_id' => $user_id])->get();
        $filmdetail = Films::where('slug', $slug)->first();
        $typefilms = $filmdetail->typefilms()->get();

        $phimle  = Kindoffilms::where('slug', 'phim-le')->first();
        $phimbo  = Kindoffilms::where('slug', 'phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();

        $user_id = Auth::id();
        $wishList = Wishlist::where(['user_id' => $user_id])->get();
        $itemWish = [];
        if (count($wishList) > 0) {
            foreach ($wishList as $wish) {
                $itemWishCheck = Wishlist::where(['film_id' => $filmdetail->id])->first();
                if ($itemWishCheck) {
                    $itemWish = Films::where('id', $itemWishCheck->film_id)->first();
                }
            }
        }

        return view($this->pathView . "filmdetail", compact('filmdetail', 'typefilms', 'wishlist', "oddmovie", "seriesmovie", "itemWish"));
    }
    public function filmtrailer($slug)
    {
        $data["wishlist"] = session()->get("wishList");
        $filmtrailer = Films::where('slug', $slug)->first();
        return view($this->pathView . "trailerfilm", compact('filmtrailer'))->with($data);
    }
    public function searchFilms(Request $request)
    {
        $user_id = Auth::id();
        $wishlist = Wishlist::where(['user_id' => $user_id])-> get();

        if (isset($request['keyword'])) {
            $keyword = $request['keyword'];
        }
        $typeList = Typefilms::all();
        $kindFilms = Kindoffilms::all();
        $years = Films::distinct('year')->pluck('year');
        $films = Films::where("name", "LIKE", "%" . $keyword . "%")->paginate(12);

        $phimle  = Kindoffilms::where('slug', 'phim-le')->first();
        $phimbo  = Kindoffilms::where('slug', 'phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();

        return view(
            $this->pathView . "searchFilms",compact("keyword", "films", "kindFilms", "typeList", "years", "oddmovie", "seriesmovie","wishlist"));
    }

    public function filmwatch($slug)
    {
        $user_id = Auth::id();
        $wishlist = Wishlist::where(['user_id' => $user_id])-> get();

        $film = Films::where('slug',$slug)->first();

        $film -> filmview = $film -> filmview + 2  ;
        $film -> save();
        $phimle  = Kindoffilms::where('slug','phim-le')->first();

        $phimbo  = Kindoffilms::where('slug','phim-bo')->first();
        $oddmovie  = $phimle->films()->take(5)->get();
        $seriesmovie  = $phimbo->films()->take(5)->get();


        $watchfilms = Listfilms::where('film_id', $film->id)->orderby('episode')->get();

        return view($this -> pathView . "watchFilm" ,compact('watchfilms','film',"oddmovie","seriesmovie", "wishlist"));
    }
}
