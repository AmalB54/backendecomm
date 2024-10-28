<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScategorieController;
use App\Http\Controllers\ArticleController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/categories",[CategoryController::class,'index']);
Route::post("/categories",[CategoryController::class,'store']);
Route::get("/categories/{id}",[CategoryController::class,'show']);
Route::delete("/categories/{id}",[CategoryController::class,'destroy']);
Route::put("/categories/{id}",[CategoryController::class,'update']);
Route::middleware('api')->group(function () {

    Route::resource('scategories', ScategorieController::class);
    
    });
Route::middleware('api')->group(function () {
        Route::resource('articles', ArticleController::class);
        });
Route::get('/articles/art/articlespaginate', [ArticleController::class,
        'articlesPaginate']);