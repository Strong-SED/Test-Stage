<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// 🔹 Redirection vers la page de connexion
Route::get('/', fn () => redirect('/login'));

// 🔹 Dashboard protégé par l'authentification et la vérification email

// 🔹 Routes nécessitant l'authentification
Route::middleware(['auth', 'verified'])->group(function () {

    // 🟠 Gestion du profil utilisateur
    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
        Route::delete('/', 'destroy')->name('profile.destroy');
    });

    // 🔹 Routes CRUD pour les articles
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/', 'index')->name('Index');
        Route::get('/{art}', 'show')->name('show');
        Route::post('/createArt', 'store')->name('store');
        Route::put('/modifyArt/{art}', 'upgrade')->name('upgrade');
        Route::delete('/destroyArticle/{art}', 'destroy')->name('destroy');
    });

    // 🔹 Routes pour la gestion des articles
    Route::prefix('article')->controller(ArticleController::class)->group(function () {
        Route::get('/create', 'create')->name('article.create');
        Route::get('/modify/{art}', 'modify')->name('article.modify');
        Route::get('/pdf/{art}', 'PDFView')->name('pdfView');
        Route::get('/scan' , 'scanner')->name("scan");
    });


    // 🟠 Déconnexion
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

