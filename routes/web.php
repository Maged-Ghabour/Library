<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;



Route::middleware("setLang")->group(function(){



Route::middleware("isLogin")->group(function(){

    # Books : Create
    Route::get("/books/create",[bookController::class,"create"])->name("books.create");
    Route::post("/books/store",[bookController::class,"store"])->name("books.store");

    #Books : Update
    Route::get("/books/edit/{id}",[bookController::class,"edit"])->name("books.edit");
    Route::post("/books/update/{id}",[bookController::class,"update"])->name("books.update");


    # Books : Delete

    Route::get("/books/del/{id}",[bookController::class,"delete"])->name("books.del");


    # cats : Create
    Route::get("/cats/create",[CatController::class,"create"])->name("cats.create");
    Route::post("/cats/store",[CatController::class,"store"])->name("cats.store");


    #cats : Update
    Route::get("/cats/edit/{id}",[CatController::class,"edit"])->name("cats.edit");
    Route::post("/cats/update/{id}",[CatController::class,"update"])->name("cats.update");



    # cats : Delete
    Route::get("/cats/del/{id}",[CatController::class,"delete"])->name("cats.del");

    #Auth : Logout
    Route::get("/logout",[AuthController::class,"logout"])->name("auth.logout");



    #Notes
    Route::get("/notes",[NoteController::class,"index"])->name("notes.index");

    # Notes: Create
    Route::get("/notes/create",[NoteController::class,"create"])->name("notes.create");
    Route::post("/notes/store",[NoteController::class,"store"])->name("notes.store");

    #Note : Delete
    Route::get("/notes/delete/{id}",[NoteController::class,"delete"])->name("notes.delete");

});

Route::middleware("isGuest")->group(function(){

    #Auth : Register
    Route::get("/register",[AuthController::class,"register"])->name("auth.register");
    Route::post("/handleRegister",[AuthController::class,"handleRegister"])->name("auth.handleRegister");

    #Auth : Login
    Route::get("/login",[AuthController::class,"login"])->name("auth.login");
    Route::post("/handleLogin",[AuthController::class,"handleLogin"])->name("auth.handleLogin");
});


# Books : Read
Route::get("/",[bookController::class,"index"])->name("books.index");

Route::get("/books/search",[bookController::class,"search"])->name("books.search");


Route::get("/books/show/{id}",[bookController::class,"show"])->name("books.show");

# cats : Read
Route::get("/cats",[CatController::class,"index"])->name("cats.index");
Route::get("/cats/show/{id}",[CatController::class,"show"])->name("cats.show");






///////////////////////////////////////////////////////////////////////////////////

# Admin

Route::get("/admin/books/create",[AdminController::class,"create"])->name("admin.books.create");

Route::get("/admin/books/index",[AdminController::class,"index"])->name("admin.books.index");

Route::get("/dashboard",function(){
    return view("dashboard");
});

////////////////////////////////////////////////////////////////////////////////////////




Route::get("/lang/ar" , [LangController::class,"ar"])->name("lang.ar");
Route::get("/lang/en" , [LangController::class,"en"])->name("lang.en");


});



