<?php

use App\Http\Controllers\Frontend\HomeController;
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


Route::group(['as'=>'frontend.'],function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('/services',[HomeController::class, 'services'])->name('services');
    Route::get('/services/{service}',[HomeController::class, 'singleService'])->name('singleService');
    Route::get('/about-us',[HomeController::class, 'about'])->name('about');
    Route::get('work-with-us',[HomeController::class, 'work'])->name('work');
    Route::get('/our-teams',[HomeController::class, 'teams'])->name('teams');
    Route::get('/contact-us',[HomeController::class, 'contact'])->name('contact');
});
