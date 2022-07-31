<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PaginationAndSearchController;
use \App\Http\Controllers\PaginationController;

//pagination
  //Route::get('/page',[PaginationAndSearchController::class,'page']);

//live search
   Route::get('/search', [PaginationAndSearchController::class,'search']);
   Route::get('/search/action',[PaginationAndSearchController::class,'action'])->name('search.action');

//pagination
    //Route::get('/pagination',[PaginationAndSearchController::class,'pagination']);

//webslesson
   // Route::get('/pagination', [PaginationController::class,'index']);
   // Route::get('/pagination/fetch_data', [PaginationController::class,'fetch_data']);

