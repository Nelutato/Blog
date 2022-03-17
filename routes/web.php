<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentControll;
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
Route::group(['middleware'=>['AuthUserCheck'],'prefix' => 'user'],function()
{
    Route::post('/register', [UserController::class , 'register']);
    Route::post('/login', [UserController::class , 'logIn']);
    Route::view('/', 'login');
    Route::get('/view',[UserController::class, 'UserView']);
    Route::get('/logout',[UserController::class, 'logout']);
});

// ADMIN
Route::group(['middleware'=> ['AuthAdminCheck'], 'prefix'=> 'admin'],function()
{
    Route::post('/registerAdminAccount', [AdminController::class , 'register']);
    Route::post('/login', [AdminController::class , 'logIn']);
    Route::view('/loginform', 'adminLogin');
    Route::view('/registerform' , 'registerAdmin');
    Route::get('/panel', [AdminController::class, 'index']);
    Route::get('/logout', [AdminController::class , 'logOut']);
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


