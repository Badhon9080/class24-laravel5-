<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomepageController;

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
Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');
Auth::routes();

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard' ])->name('dashboard');



Route::get('/dashboard/category', [CategoryController::class,
 'category'])->name( 'category' );


Route::post('/dashboard/category', [CategoryController::class,
'categoryInsert'])->name( 'category.insert' );

Route::get('/dashboard/delete/{id}', [CategoryController::class,
'categoryDelete'])->name( 'category.delete' );

Route::get('/dashboard/edit/{id}', [CategoryController::class,
'categoryEdit'])->name( 'category.edit' );

Route::put('/dashboard/update/{id}', [CategoryController::class,
'categoryUpdate'])->name( 'category.update' );
