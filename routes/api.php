<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Public Routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/test',function(){
       return response()->json(['test'=>123]);
   });


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout',[AuthController::class,'logout']);
    //Authors Routes
    Route::post('/create-author',[AuthorsController::class,'store']);
    Route::get('/edit-author/{id}',[AuthorsController::class,'edit']);
    Route::delete('/delete-author/{id}',[AuthorsController::class,'destroy']);
    Route::post('/update-author/{id}',[AuthorsController::class,'update']);
    Route::get('/authors',[AuthorsController::class,'paginate']);
    //Books Routes
    Route::post('/create-book',[BooksController::class,'store']);
    Route::get('/edit-book/{id}',[BooksController::class,'edit']);
    Route::delete('/delete-book/{id}',[BooksController::class,'destroy']);
    Route::post('/update-book/{id}',[BooksController::class,'update']);
});
