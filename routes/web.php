<?php

use App\Http\Controllers\Auth\UserDeleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecepieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\Admin\DasboardController;


Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'Auth'], function () {

    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'userView'])->name('userView')->middleware('auth');
        Route::put('/updateName', [UserUpdate::class, 'updateName'])->name('update.name');
        Route::put('/updateEmail', [UserUpdate::class, 'updateEmail'])->name('update.email');
        Route::delete('/deleteUser', [UserDeleteController::class, 'deleteUser'])->name('uesr.delete');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::resource('admin', 'Auth\Admin\AdminController')->except(['create', 'store']);

        Route::group(['as' => 'admin.', 'prefix' => 'dashboard'], function () {
            Route::get('/user', [DasboardController::class, 'dashboardUsers'])->name('dashboardUser');
            Route::post('/make/{id}', [DasboardController::class, 'makeAdmin'])->name('makeAdmin');
            Route::get('/recepies', [DasboardController::class, 'dashboardRecepies'])->name('dashboardRecepies');
            Route::get('/coments', [DasboardController::class, 'dashboardComents'])->name('dashboardComents');
            Route::get('/{where}', [DasboardController::class, 'search'])->name('search');
            Route::delete('delete/{who}/{id}', [DasboardController::class, 'dashboardDelete'])->name('delete');
        });
    });

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
        ->only(['index', 'show', 'destroy']);


    Route::group(
        ['middleware' => 'auth', 'prefix' => 'create'],
        function () {
            Route::get('/subRecepie/{slug}', [RecepieController::class, 'subRecepieCreateForm'])->name('subCreateForm');
            Route::post('/subRecepie/{slug}', [RecepieController::class, 'store'])->name('subCreate');
        }
    );
});
