<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\EditRecepie;
// use App\Http\Controllers\ComentControll;
// use App\Http\Controllers\SearchSortEngine;
// use App\Http\Controllers\recepieOpinion;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecepieController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function()
{
    Auth::routes();
    Route::get('/',[HomeController::class, 'userView'])->name('userView');
    Route::put('/updateName',[UserUpdate::class , 'updateName'])->name('update.name');
    Route::put('/updateEmail',[UserUpdate::class , 'updateEmail'])->name('update.email');
});

Route::group(['middleware' => 'auth' ,
        'prefix'=> 'create'
    ],function()
    {
        Route::get('/recepie', [RecepiesController::class, 'createform'])-> name('recepie');
        Route::post('/Post', [RecepiesController::class , 'createPost'])-> name('post');
        Route::get('/edit/{slug}', [EditRecepie::class, 'EditForm']);
        Route::post('/edit/{slug}', [EditRecepie::class, 'create'])->name('edited');
    }
);

Route::group(['prefix'=>'Recepies'],
    function(){
        Route::resource('Recepie','RecepieController')->except('destroy, update, edit');    
        // Route::post('/addComent/{slug}', [ComentControll::class , 'addComment']);
        // Route::get('/list/{slug}', [RecepieCotroller::class, 'listEditedRecepies'])->name('listEdited');
    }
);
Route::redirect('/', '/welcome');
Route::get('{page}', [RecepiesController::class ,'show'])->name('main');
