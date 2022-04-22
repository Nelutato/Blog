<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecepieController;
// use App\Http\Controllers\recepieOpinion;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubRecepieController;

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function () {
    Auth::routes();
    Route::get('/', [HomeController::class, 'userView'])->name('userView')->middleware('auth');
    Route::put('/updateName', [UserUpdate::class, 'updateName'])->name('update.name');
    Route::put('/updateEmail', [UserUpdate::class, 'updateEmail'])->name('update.email');
});


Route::group(['prefix' => 'Recepies'], function () {
    Route::post('/addComent', [RecepieController::class, 'addComment']);
    Route::get('/list/{slug}', [RecepieController::class, 'listSubRecepies'])->name('list');
    Route::post('/sort', [RecepieController::class, 'sortRecepie'])->name('sort');
    Route::post('/Recepie/{slug}', [RecepieController::class, 'store'])->name('Recepie.store');
    Route::resource('Recepie', 'RecepieController')->except('destroy, update, edit, store');

    Route::group(
        [
            'middleware' => 'auth',
            'prefix' => 'create'
        ],
        function () {
            Route::get('/subRecepie/{slug}', [RecepieController::class, 'subRecepieCreateForm'])->name('subCreateForm');
            Route::post('/subRecepie/{slug}', [RecepieController::class, 'store'])->name('subCreate');
            // Route::post('/Post', [RecepiesController::class, 'createPost'])->name('post');
            // Route::get('/edit/{slug}', [EditRecepie::class, 'EditForm']);
            // Route::post('/edit/{slug}', [EditRecepie::class, 'create'])->name('edited');
        }
    );
});
