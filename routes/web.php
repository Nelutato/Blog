<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainSites;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthUserCheck;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentControll;
use App\Http\Middleware\AuthAdminCheck;
use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\ShowRecepie;
use App\Models\Coment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('{slug}', [ShowRecepie::class ,'show']);


Route::get('/user/logout',[UserController::class, 'logout']);
Route::post('/user/register', [UserController::class , 'register']);
Route::post('/user/login', [UserController::class , 'logIn']);

Route::group(['middleware'=>['AuthUserCheck']],function()
{
    Route::view('user', 'login');
    Route::get('/user/view',[UserController::class, 'UserView']);
});


Route::post('/admin/registerAdminAccount', [AdminController::class , 'register']);
Route::post('/admin/login', [AdminController::class , 'logIn']);
Route::get('/admin/logout', [AdminController::class , 'logOut']);

Route::group(['middleware'=>['AuthAdminCheck']],function()
{
    Route::view('/admin/loginform', 'adminLogin');
    Route::view('/admin/registerform' , 'registerAdmin');
    Route::get('/admin/panel', [AdminController::class, 'index']);
    Route::get('/admin/recepieCreate', [RecepiesController::class, 'createform']);
});
// Dodaj to do middlewar-u !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! \/
Route::post('admin/createPost', [RecepiesController::class , 'createPost']); 

//                      =                           =                   =               =           =
Route::get('/Recepies/Wiew/{slug}', [ShowRecepie::class , 'showFullRecepie']);
Route::post('/Recepies/addComent/{slug}', [ComentControll::class , 'addComment']);

// Route::get('/{slug}', [MainSites::class , 'index']);
