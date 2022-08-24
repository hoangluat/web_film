<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Films;
use App\Models\Kindoffilms;

class PageController extends Controller
{
    protected $pathView = "enduser.pages.";

    public function index()
    {
        $data['wishlist'] = session() -> get("wishList");
        $slidebars = Banner::where([
            ['status', 'active']
        ])->orderBy('id')->limit(2)->get();
        $phimle  = Kindoffilms::where('slug','phim-le')->first();
        $phimbo  = Kindoffilms::where('slug','phim-bo')->first();
        $oddmovie  = $phimle->films()->get();
        $seriesmovie  = $phimbo->films()->get();

        return view($this -> pathView . "index" ,compact("slidebars","seriesmovie","oddmovie"))->with($data);
    }
}
