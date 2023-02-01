<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth','CheckRole:admin')->group(function(){
    //route book admin
    Route::get('book/create',[BookController::class, 'create'])->name("book-create");
    Route::post('book/store',[BookController::class, 'store'])->name("book-store");
    Route::delete('book/delete/{id}',[BookController::class, 'destroy'])->name("book-delete");
    Route::get('book/edit/{id}',[BookController::class, 'edit'])->name("book-edit");
    Route::put('book/update/{id}',[BookController::class, 'update'])->name("book-update");
});

Route::middleware('auth','CheckRole:admin,user')->group(function(){
    //route book admin & user
    Route::get('book/index',[BookController::class, 'index'])->name("book-index");
    Route::get('book/show/{id}',[BookController::class, 'show'])->name("book-show");
    //route dashboard admin & user
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Auth::routes();