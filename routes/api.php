<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Mail\PublishedNotifier;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;
use Stripe\Stripe;

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

Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    auth()->user()->tokens()->delete();
});


Route::post('login', [AuthController::class, 'authenticate']);

Route::group(['middleware' => 'auth:sanctum'], function () {


    Route::get('article/{id}/quota', [ArticleController::class, 'quota']);
});

// Auth middleware is implemented in controller file 
Route::resource('article', ArticleController::class);

Route::get('x',function(){
    // Mail::raw()->to(User::find(101)->email)->send(new PublishedNotifier(Article::find(1)->title));




    Mail::raw('This is a simple text', function ($m) {
        $m->to(User::find(101)->email)->subject('Email Subject');
      });
});