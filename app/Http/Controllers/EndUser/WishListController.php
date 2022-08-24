<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Films;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    protected $pathView = "enduser.pages.WishList.";
    protected $viewComponent = "enduser.components.";

    public function showWishList(){
        $wishlist = [];
        $user_id = Auth::id();
        $wishList = Wishlist::where(['user_id' => $user_id])-> get();

        if(count($wishList) > 0) {
            foreach($wishList as $wish) {
                $item = Films::where(['id' => $wish->film_id])->first();
                array_push($wishlist, $item);
            }
        }
        return view($this -> pathView . "show" , compact('wishlist'));
    }

    public function addWishList($id){
        // $wishList = session() -> get("wishList");
        // $film = Films::find($id);


        // if($id){
        //     $wishList[$id] = $film;
        //     session() -> put("wishList", $wishList);
        // }


        $user_id = Auth::id();

        $film = Films::find($id);


            $wishList = new Wishlist();
            $wishList  -> user_id = $user_id;
            $wishList  -> film_id = $film->id;
            $wishList -> save();

        // dd($user_id);
        return response() -> json([
            "code" => 200,
            'data'  => $user_id
        ],200);
    }

    public function deleteWishFilm(Request $request){


        if($request['id']){

            $wishList = Wishlist::where(['film_id' => $request['id']])-> first();
            $wishList->delete();
            return response() -> json([
                'code' => 200,
                'data' => "Đã xóa",
            ],200);
        }
    }
}