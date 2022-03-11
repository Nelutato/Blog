<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MainSites;
use App\Http\Controllers\UserController;
// use App\Http\Middleware\AuthUserCheck;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentControll;
// use App\Http\Middleware\AuthAdminCheck;
use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\ShowRecepie;
use App\Http\Controllers\EditRecepie;
use App\Http\Controllers\SearchSortEngine;
// use App\Models\Coment;
use Illuminate\Support\Facades\URL;

/*================================================*/
Route::get('/', function (){
    return redirect("/welcome");
});

// USER
Route::post('/user/register', [UserController::class , 'register']);
Route::post('/user/login', [UserController::class , 'logIn']);
Route::group(['middleware'=>['AuthUserCheck']],function()
{
    Route::view('user', 'login');
    Route::get('/user/view',[UserController::class, 'UserView']);
    Route::get('/user/logout',[UserController::class, 'logout']);
});

// ADMIN
Route::post('/admin/registerAdminAccount', [AdminController::class , 'register']);
Route::post('/admin/login', [AdminController::class , 'logIn']);
Route::group(['middleware'=>['AuthAdminCheck']],function()
{
    Route::view('/admin/loginform', 'adminLogin');
    Route::view('/admin/registerform' , 'registerAdmin');
    Route::get('/admin/panel', [AdminController::class, 'index']);
    Route::get('/admin/logout', [AdminController::class , 'logOut']);
});

// CREATING
Route::group(['middleware' =>['CreateRecepie']],function()
{
    Route::get('/recepieCreate', [RecepiesController::class, 'createform']);
    Route::post('/createPost', [RecepiesController::class , 'createPost']);
    Route::get('/Recepies/Wiew/edit/{slug}', [EditRecepie::class, 'EditForm']);
    Route::post('/edit/createRecepie/{slug}', [EditRecepie::class, 'create']);
});
// NO NEED TO LOG IN 
Route::get('/Recepies/Wiew/{slug}', [ShowRecepie::class , 'showFullRecepie']);
Route::post('/Recepies/addComent/{slug}', [ComentControll::class , 'addComment']);

Route::get('/Recepies/edited/{subpage}/{slug}', [EditRecepie::class, 'showEditedControll']);
Route::post('/Recepies/Wiew/ShowEditedOpinion/{slug}',[EditRecepie::class, 'opinion']);
Route::post('/Recepies', [SearchSortEngine::class , 'sort',])->name('sorting');
Route::get('{slug}', [ShowRecepie::class ,'show'])->name('main');


