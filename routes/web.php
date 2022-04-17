<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentControll;
use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\EditRecepie;
use App\Http\Controllers\SearchSortEngine;
use App\Http\Controllers\recepieOpinion;

Route::group(['middleware'=>'AuthUserCheck',
        'prefix'=> 'user',
        'namespace'=>'User'
    ],function()
    {
        Route::post('login', [UserController::class , 'logIn'])-> name('users.logIn');
        Route::get('logout', [UserController::class , 'logOut'])-> name('users.logOut');
        Route::resource('users', 'UserController')->except(['edit','create']);
    }
);

Route::group(['middleware'=> 'AuthAdminCheck', 
        'prefix'=> 'admin',
    ],function()
    {
        Route::post('/registerAdminAccount', [AdminController::class , 'register'])-> name('register');
        Route::post('/login', [AdminController::class , 'logIn'])-> name('login');
        Route::view('/loginform', 'adminLogin');
        Route::view('/registerform' , 'registerAdmin');
        Route::get('/panel', [AdminController::class, 'index'])-> name('panel');
        Route::get('/logout', [AdminController::class , 'logOut'])-> name('logout');
    }
);

Route::group(['middleware' => 'CreateRecepie' ,
        'prefix'=> 'create'
    ],function()
    {
        Route::get('/recepieCreate', [RecepiesController::class, 'createform'])-> name('recepie');
        Route::post('/createPost', [RecepiesController::class , 'createPost'])-> name('post');
        Route::get('/edit/{slug}', [EditRecepie::class, 'EditForm']);
        Route::post('/edit/createRecepie/{slug}', [EditRecepie::class, 'create'])->name('edited');
    }
);

Route::group(['prefix'=>'Recepies'],
    function(){
        Route::get('/Wiew/{slug}', [RecepiesController::class , 'showFullRecepie']);
        Route::post('/addComent/{slug}', [ComentControll::class , 'addComment']);
        Route::post('/edited/addComent/{slug}', [ComentControll::class , 'addComment']);
        Route::get('/edited/{subpage}/{slug}', [EditRecepie::class, 'showEditedControll']);
        Route::put('/Wiew/{subpage}/{slug}',[recepieOpinion::class, 'opinion']);
        Route::post('/', [SearchSortEngine::class , 'sort',])->name('sorting');
    }
);
Route::redirect('/', '/welcome');
Route::get('{page}', [RecepiesController::class ,'show'])->name('main');

