<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Main.Home');
});



// User 
Route::get('/account/{username}', [UserController::class , "show"])->middleware("auth");
Route::get("register/", [UserController::class, "create"]);
Route::post("register/", [UserController::class, "store"])->middleware("guest");
Route::get('login/', [UserController::class, 'login'])->name("login");
Route::post('login/', [UserController::class, 'authenthicate'])->middleware("guest");
Route::get("logout/{username}" , [UserController::class , "logout"])->middleware("auth");
Route::post("update-profile/" , [UserController::class , "update"])->middleware("auth");


// Product
Route::get("/products" , [ProductController::class , "index"]);

Route::get("/product/{id}/{name}", [ProductController::class, "show"]);
Route::post("/add-product", [ProductController::class, "store"]);

