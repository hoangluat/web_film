<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require("admin.php");

Route::namespace("EndUser")->group(function(){
    Route::get('/', 'PageController@index')->name('page.index');


     /*----- Authentication -----*/
     $prefix = "";
     $controller = "auth";
     Route::prefix($prefix)->name($controller . ".")->group(function () use ($controller){
         $controllerName = ucfirst($controller) . "Controller@";
         Route::get("/dang-nhap", $controllerName . "login")->name("login");
         Route::post("/kiem-tra-dang-nhap", $controllerName . "checkLogin")->name("checkLogin");
         Route::get("dang-ky", $controllerName . "register")->name("register");
         Route::post("kiem-tra-dang-ky", $controllerName . "checkRegister")->name("checkRegister");
         Route::get("xac-thuc-dang-ky/{code}", $controllerName . "verifyRegister")->name("verifyRegis");
         Route::get("dang-xuat", $controllerName . "logout")->name("logout");

     });

    /*----- Films -----*/
    $prefix = "phim";
    $controller = "films";
    Route::prefix($prefix)->name($controller . ".")->group(function () use ($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        // Route::get("/", $controllerName."index")->name("index");
        Route::get("/tim-kiem-phim", $controllerName . "searchFilms")->name("searchFilms");
        Route::get("/{slug}", $controllerName."filmdetail")->name("filmdetail");
        Route::get("/trailer/{slug}", $controllerName."filmtrailer")->name("filmtrailer");
        Route::get("xemphim/{slug}", $controllerName."filmwatch")->name("filmwatch");
        // Route::get("/{slug}", $controllerName."blogDetail")->name("blogDetail");
    });

    /*----- WishList -----*/
    $prefix = "danh-sach-yeu-thich";
    $controller = "wishList";
    Route::prefix($prefix)->name($controller . ".")->group(function () use ($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName."showWishList")->name("showWishList");
        Route::get("them-danh-sach-yeu-thich/{id}", $controllerName."addWishList")->name("addWishList");
        Route::get("xoa-san-pham-yeu-thich", $controllerName."deleteWishFilm")->name("deleteWishFilm");
    });
    /*----- forgot-reset password -----*/ 
    Route::get("forgot-password", "ForgotPasswordController@showForgotPasswordForm")->name("forgotpass.get");
    Route::post("forgot-password", "ForgotPasswordController@submitForgotPasswordForm")->name("forgotpass.post"); 
    Route::get("reset-password/{token}", "ForgotPasswordController@showResetPasswordForm")->name("resetpass.get");
    Route::post("reset-password", "ForgotPasswordController@submitResetPasswordForm")->name("resetpass.post");

    /*----- profile -----*/
    Route::get("profiles", "ProfilesController@show")->name("profiles.get");
    Route::post("profiles", "ProfilesController@updateAVT")->name("profiles.post");
    // showFilm
    
    // Route:: get('showFilmType/{slug}','TypeFilmController@TypeFilm');
    // Route::get('the-loai/{keyword}', 'TypeFilmController@TypeFilm')->name("showTypeFilm");
    Route::get('the-loai/{keyword}', 'TypeFilmController@showTypeList')->name("showTypeFilm");
    Route::get('nam/{keyword}', 'YearFilmController@showYearList')->name("showYearFilm");
    Route::get('/phim-bo', 'SeriesFilmController@seriesFilm');
    Route::get('/phim-le', 'OddFilmController@oddFilm');
    Route::get('/phim-moi', 'NewFilmController@newFilm');
    Route::get('/phim-chieu-rap', 'CinemaFilmController@cinemaFilm');
    // Route::get('phim-le/{keyword}', 'FilmsController@searchFilms');
    // Route::get('/','SortController')
    Route::get("loc-phim", "SortController@showSortList")->name("showSortList");
   
});


