<?php
use App\Http\Middleware\CreateRecepie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentControll;
use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\ShowRecepie;
use App\Http\Controllers\EditRecepie;
use App\Http\Controllers\SearchSortEngine;

// Maturka

Route::get('/', function (){
    return redirect("/welcome");
});

// USER

Route::group(['middleware'=>'AuthUserCheck', 'prefix'=> 'user','name'=> 'user.' ],function()
{
    Route::post('/register', [UserController::class , 'register'])->name('register');
    Route::post('/login', [UserController::class , 'logIn'])->name('login');
    Route::view('/', 'login')->name('loginView');
    Route::get('/view',[UserController::class, 'UserView'])->name('view');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
});

// ADMIN
Route::group(['middleware'=> ['AuthAdminCheck'], 'prefix'=> 'admin'],function()
{
    Route::post('/registerAdminAccount', [AdminController::class , 'register'])->name('register');
    Route::post('/login', [AdminController::class , 'logIn'])->name('login');
    Route::view('/loginform', 'adminLogin');
    Route::view('/registerform' , 'registerAdmin');
    Route::get('/panel', [AdminController::class, 'index'])->name('panel');
    Route::get('/logout', [AdminController::class , 'logOut'])->name('logout');
});

Route::group(['middleware' => 'CreateRecepie' ,'prefix'=> 'create'],function()
{
    Route::get('/recepieCreate', [RecepiesController::class, 'createform'])->name('recepie');
    Route::post('/createPost', [RecepiesController::class , 'createPost'])->name('post');
    Route::get('/edit/{slug}', [EditRecepie::class, 'EditForm']);
    Route::post('/edit/createRecepie/{slug}', [EditRecepie::class, 'create'])->name('edited');
});

// NO NEED TO LOG IN 
Route::get('/Recepies/Wiew/{slug}', [ShowRecepie::class , 'showFullRecepie']);
Route::post('/Recepies/addComent/{slug}', [ComentControll::class , 'addComment']);
Route::post('/Recepies/edited/addComent/{slug}', [ComentControll::class , 'addComment']);
Route::get('/Recepies/edited/{subpage}/{slug}', [EditRecepie::class, 'showEditedControll']);
Route::get('/Recepies/Wiew/{subpage}/{slug}',[RecepiesController::class, 'opinion']);
Route::post('/Recepies', [SearchSortEngine::class , 'sort',])->name('sorting');
Route::get('{slug}', [ShowRecepie::class ,'show'])->name('main');


