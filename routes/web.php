<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
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


// User 
Route::get('/account/{username}', [UserController::class , "show"])->middleware("auth");
Route::get("register/", [UserController::class, "create"]);
Route::post("register/", [UserController::class, "store"])->middleware("guest");
Route::get('login/', [UserController::class, 'login'])->name("login");
Route::post('login/', [UserController::class, 'authenthicate'])->middleware("guest");
Route::get("logout/{username}" , [UserController::class , "logout"])->middleware("auth");
Route::post("update-profile/" , [UserController::class , "update"])->middleware("auth");

// Order
Route::post("/add-to-order", [OrderController::class, "store"])->middleware("auth");
Route::get("/order/{username}", [OrderController::class, "index"])->middleware("auth");
Route::get("/remove-order/{id}/{product_id}", [OrderItemController::class, "destroy"])->middleware("auth");


// Homa Page
Route::get("/", [ProductController::class, "homePage"]);

// Product
Route::get("/products" , [ProductController::class , "index"]);
Route::get("/{username}/products" , [ProductController::class , "showUserProduct"])->middleware("auth");
Route::get("/product/{id}/{name}", [ProductController::class, "show"]);
Route::post("/add-product", [ProductController::class, "store"])->middleware("auth");
Route::get("/delete/{name}/{id}" , [ProductController::class , "destroy"])->middleware("auth");
Route::get("/add-product", [ProductController::class, "create"])->middleware("auth");
Route::get("/edit/{name}/{id}", [ProductController::class, "edit"])->middleware("auth");
Route::post("/edit/{name}/{id}", [ProductController::class, "update"])->middleware("auth");

// Ads
Route::get("/create-ads" , [AdvertisementController::class, "create"])->middleware("admin");
Route::post("/create-ads", [AdvertisementController::class, "store"])->middleware("admin");
Route::get("/manage-ads" , [AdvertisementController::class, "show"])->middleware("admin");
Route::get("/edit-ads/{id}" , [AdvertisementController::class, "edit"])->middleware("admin");
Route::post("/edit-ads/{id}" , [AdvertisementController::class, "update"])->middleware("admin");
Route::get("/delete-ads/{id}" , [AdvertisementController::class, "destroy"])->middleware("admin");

// Category