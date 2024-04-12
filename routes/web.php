<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Comment
Route::controller(CommentController::class)->group(function(){
    Route::post('comment', 'store');
    //Route::resource('comment');
    Route::get('comment', 'index')->name('comment.index');
    Route::get('comment/{comment}/accept', 'accept');
    Route::get('comment/{comment}/reject', 'reject');
});

//Route::post('comment', [CommentController::class, 'store']);


//Article
Route::resource('article', ArticleController::class);

//auth
Route::get('signin', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('signup', [AuthController::class, 'signup']);
Route::get('logout', [AuthController::class, 'logout']);


//MainController
Route::get('/', [MainController::class, 'index']);
Route::get('/full-img/{img}', [MainController::class, 'show']);




Route::get('/contacts', function(){
    $contacts = [
        'univer' => 'Polytech',
        'phone' => '89870640917',
        'email' => 'mospolyteh@mail.ru'
    ];
    return view('main.contact', ['contacts' => $contacts]);
});

