<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'authenticate']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    

    Route::get('article/{id}/quota', [ArticleController::class,'quota']);
});

// Auth middleware is implemented in controller file 
Route::resource('article', ArticleController::class);

Route::get('/test', function(){
$data = User::find(1)->tokens()->delete();
return $data;
});



// Route::get('/x', function(){
   
//     return User::join('articles','users.id','articles.user_id')->where('articles.id',1)->get(['title','description']);
// });