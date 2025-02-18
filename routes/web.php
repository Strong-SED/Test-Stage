<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class , 'index'])-> name('Index');

Route::get("/{art}" , [ArticleController::class , "show"])->name("show");


Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');

Route::post('/createArt', [ArticleController::class, 'store'])->name('store');


Route::get('/article/modify/{art}' , [ArticleController::class , "modify"])->name("article.modify");

Route::put('/modifyArt{art}' , [ArticleController::class , "upgrade"])->name("upgrade");

Route::delete('destroyArticle/{art}', [ArticleController::class , 'destroy'])->name("destroy");



