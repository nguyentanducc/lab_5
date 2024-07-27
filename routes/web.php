<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MovieController::class,'index'])->name('home');
Route::get('/create',[MovieController::class,'create']
)->name('create');
Route::post('/create', [MovieController::class,'store']
)->name('store');
Route::get('/edit/{movie}',[MovieController::class,'edit']
)->name('edit');
Route::put('/edit/{movie}', [MovieController::class,'update']
)->name('update'); 
Route::get('/detail/{movie}',[MovieController::class,'detail']
)->name('detail');
Route::delete('/delete/{movie}', [MovieController::class,'destroy']
)->name('destroy');
Route::get('/search',[MovieController::class,'search']
)->name('search');