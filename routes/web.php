<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// Redirection vers la page de connexion
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard protégé par l'authentification et la vérification email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes nécessitant l'authentification
Route::middleware(['auth', 'verified'])->group(function () {

    // 🔹 Routes pour le profil utilisateur
    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
        Route::delete('/', 'destroy')->name('profile.destroy');
    });

    // 🔹 Routes pour la gestion des articles
    Route::prefix('article')->controller(ArticleController::class)->group(function () {
        Route::get('/create', 'create')->name('article.create');
        Route::get('/modify/{art}', 'modify')->name('article.modify');
        Route::get('/pdf/{art}', 'PDFView')->name('pdfView');
    });

    // 🔹 Routes CRUD pour les articles
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/', 'index')->name('Index');
        Route::get("/{art}", "show")->name("show");
        Route::post('/createArt', 'store')->name('store');
        Route::put('/modifyArt/{art}', "upgrade")->name("upgrade");
        Route::delete('/destroyArticle/{art}', 'destroy')->name("destroy");
    });



    // 🔹 Route pour la déconnexion
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// 🔹 Scanner QR Code
Route::get('/scanner/{art}', [ArticleController::class, 'qrscan'])->name('scanner');
