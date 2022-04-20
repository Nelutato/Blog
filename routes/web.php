<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserUpdate;
// use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComentControll;
use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\EditRecepie;
use App\Http\Controllers\SearchSortEngine;
use App\Http\Controllers\recepieOpinion;
use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function()
{
Auth::routes();
Route::get('/',[HomeController::class, 'userView'])->name('userView');
Route::put('/updateName',[UserUpdate::class , 'updateName'])->name('update.name');
Route::put('/updateEmail',[UserUpdate::class , 'updateEmail'])->name('update.email');
});


// Route::group(['middleware'=> 'AuthAdminCheck', 
//         'prefix'=> 'admin',
//     ],function()
//     {
//         Route::post('/registerAdminAccount', [AdminController::class , 'register'])-> name('register');
//         Route::post('/login', [AdminController::class , 'logIn'])-> name('login');
//         Route::view('/loginform', 'adminLogin');
//         Route::view('/registerform' , 'registerAdmin');
//         Route::get('/panel', [AdminController::class, 'index'])-> name('panel');
//         Route::get('/logout', [AdminController::class , 'logOut'])-> name('logout');
//     }
// );

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
        Route::post('/', [SearchSortEngine::class , 'sort',])->name('sorting');
        Route::get('/Wiew/{slug}', [RecepiesController::class , 'showFullRecepie']);
        Route::put('/Wiew/{subpage}/{slug}',[recepieOpinion::class, 'opinion']);
        Route::post('/addComent/{slug}', [ComentControll::class , 'addComment']);
        Route::post('/edited/addComent/{slug}', [ComentControll::class , 'addComment']);
        Route::get('/edited/ShowEdited/{slug}', [EditRecepie::class, 'showEditedRecepie'])->name('showEdited');
        Route::get('/edited/list/{slug}', [EditRecepie::class, 'listEditedRecepies'])->name('listEdited');
    }
);
Route::redirect('/', '/welcome');
Route::get('{page}', [RecepiesController::class ,'show'])->name('main');
