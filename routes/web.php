<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecepieController;
// use App\Http\Controllers\recepieOpinion;
use App\Http\Controllers\HomeController;
use App\Models\Recepie;

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [HomeController::class, 'userView'])->name('userView')->middleware('auth');
    Route::put('/updateName', [UserUpdate::class, 'updateName'])->name('update.name');
    Route::put('/updateEmail', [UserUpdate::class, 'updateEmail'])->name('update.email');
    Auth::routes();
});


Route::group(['prefix' => 'Recepies/'], function () {

    Route::group(['as' => 'Recepie.'], function () {
        Route::get('/Recepie/create', [RecepieController::class, 'create'])->middleware('auth')->name('create');
        Route::post('/addComent', [RecepieController::class, 'addComment'])->name('coment');
        Route::get('/list/{slug}', [RecepieController::class, 'listSubRecepies'])->name('list');
        Route::post('/sort', [RecepieController::class, 'sortRecepie'])->name('sort');
        Route::post('/Recepie/{slug}', [RecepieController::class, 'store'])->name('store');
        Route::put('/opinion/{slug}', [RecepieController::class, 'opinion'])->name('opinion');
        Route::post('/Recepie/{slug?}', [RecepieController::class, 'store'])->name('store');
    });
    Route::resource('Recepie', 'RecepieController')
        ->only(['index', 'show']);


    Route::group(
        ['middleware' => 'auth', 'prefix' => 'create'],
        function () {
            Route::get('/subRecepie/{slug}', [RecepieController::class, 'subRecepieCreateForm'])->name('subCreateForm');
            Route::post('/subRecepie/{slug}', [RecepieController::class, 'store'])->name('subCreate');
        }
    );
});
