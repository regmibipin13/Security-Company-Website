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


Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/services/{service}', [HomeController::class, 'singleService'])->name('singleService');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about');
    Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
    Route::get('/our-teams', [HomeController::class, 'teams'])->name('teams');
    Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
    Route::post('/media', [HomeController::class, 'storeMedia'])->name('storeMedia');
    Route::get('/satisfaction', [HomeController::class, 'showFeedbackForm'])->name('feedback');
    Route::post('/satisfaction', [HomeController::class, 'storeFeedback'])->name('feedback');
});


Route::group(['prefix' => 'api/v1/'], function () {
    Route::post('/contact/company', [HomeController::class, 'apiCompany']);
    Route::post('/contact/employee', [HomeController::class, 'apiEmployee']);
    Route::post('/contact/training', [HomeController::class, 'apiTraining']);
});
