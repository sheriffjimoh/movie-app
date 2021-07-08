<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// movie Route
Route::resource('movie', MovieController::class);
Route::get('movie/bycategory/{key}', [MovieController::class , 'Bycategory']);
Route::get('movie/bysearch/{key}', [MovieController::class , 'Bysearch']);
Route::post('movie/updateimage',[MovieController::class, 'updateImage']);

// category Route
Route::resource('category',CategoryController::class);