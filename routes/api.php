<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TagController;
//use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get("/testApi",function(){
//     return "Hello from api";
// });


//  Route::get('categories',[CategoryController::class, 'index']);
//  Route::get('categories',[CategoryController::class, 'show']);

 //Route::get('categories/{id}',[CategoryController::class, 'show']);

//  Route::post('categories',[CategoryController::class, 'create']);

// Route::delete('categories/{id}',[CategoryController::class, 'destroy']);


// Route::put('categories/{id}',[CategoryController::class, 'update']);


 Route::apiResource("/categories",CategoryController::class);
 Route::apiResource("/products", ProductController::class);
Route::apiResource("/tags",TagController::class);
Route::get("/filterTag",[TagController::class,'filter']);
Route::apiResource("/users",UserController::class);
