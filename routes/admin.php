<?php
/*------ Auth ------*/
Route::prefix("auth")->name("authAdmin.")->group(function (){
    $controller = "AuthController@";
    Route::get("/login", $controller . "login")->name("login");
    Route::post("/authenticate", $controller . "postLogin")->name("postLogin");
    Route::get("/logout", $controller . "logout")->name("logout");
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
/*------ Admin ------*/
Route::namespace("Admin")->prefix("admin")->middleware('auth')->name("admin.")->group(function (){


/*------ Menu ------*/
    $prefix = "menu";
    $controller = "menu";
    Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
    });

    /*------ Banner ------*/
    $prefix = "banner";
    $controller = "banner";
    Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
        Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
        Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
        Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
        Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
        Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
    });


    /*------ Films ------*/
    $prefix = "films";
    $controller = "films";
    Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
        Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
        Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
        Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
        Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
        Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
    });

    /*------ Films Kind ------*/
    $prefix = "kindoffilms";
    $controller = "kindoffilms";
    Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
        Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
        Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
        Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
        Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
        Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
    });

    /*------ Nationals ------*/
    $prefix = "nationals";
    $controller = "nationals";
    Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
        Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
        Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
        Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
        Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
        Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
    });

    /*------ Type Film ------*/
    $prefix = "typefilms";
    $controller = "typefilms";
    Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
        $controllerName = ucfirst($controller) . "Controller@";
        Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
        Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
        Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
        Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
        Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
        Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
    });




        /*------ User ------*/
        $prefix = "user";
        $controller = "user";
        Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
            $controllerName = ucfirst($controller) . "Controller@";
            // dd($controllerName);
            Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
            Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
            Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
            Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
            Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
            Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
        });

        /*------ Role ------*/
        $prefix = "role";
        $controller = "role";
        Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
            $controllerName = ucfirst($controller) . "Controller@";
            Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
            Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
            Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
            Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
            Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
            Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
        });
        /**config */
        $prefix = "config";
        $controller = "config";
        Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
            $controllerName = ucfirst($controller) . "Controller@";
            Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
            Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
            Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
            Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
            Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
            Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
        });

        // widget
        $prefix = "widget";
        $controller = "widget";
        Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
            $controllerName = ucfirst($controller) . "Controller@";
            Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
            Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
            Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
            Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
            Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
            Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
        }); 

     /*------ ListFilms ------*/
     $prefix = "listfilms";
     $controller = "listfilms";
     Route::prefix($prefix)->name($controller . ".")->group(function () use($controller){
         $controllerName = ucfirst($controller) . "Controller@";
         Route::get("/", $controllerName . "index")->middleware("can:" . $controller . ".index")->name("index");
         Route::get("create", $controllerName . "create")->middleware("can:" . $controller . ".create")->name("create");
         Route::post("store", $controllerName . "store")->middleware("can:" . $controller . ".create")->name("store");
         Route::get("edit/{id}", $controllerName . "edit")->middleware("can:" . $controller . ".edit")->name("edit");
         Route::post("update/{id}", $controllerName . "update")->middleware("can:" . $controller . ".edit")->name("update");
         Route::get("delete/{id}", $controllerName . "delete")->middleware("can:" . $controller . ".delete")->name("delete");
         Route::get('/films-ne/{id}', $controllerName."getFilms")->name("getFimls");
     });
});
