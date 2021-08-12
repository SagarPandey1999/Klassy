<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/users',[AdminController::class,'user'])->name('users');
Route::get('/deleteusers/{id}',[AdminController::class,'delete'])->name('deleteusers');
Route::get('/foodmenu',[AdminController::class,'foodmenu'])->name('foodmenu');
Route::post('/uploadfood',[AdminController::class,'uploadfood'])->name('uploadfood');
Route::get('/deletefoodmenu/{id}',[AdminController::class,'deletefoodmenu'])->name('deletefoodmenu');
Route::get('/updateview/{id}',[AdminController::class,'updateview'])->name('updateview');
Route::post('/updatefood/{id}',[AdminController::class,'updatefood'])->name('updatefood');
Route::get('/redirects',[HomeController::class,'redirects'])->name('home');
Route::get('/viewreservation',[AdminController::class,'viewreservation'])->name('viewreservation');
Route::get('/viewchef',[AdminController::class,'viewchef'])->name('viewchef');
Route::post('/uploadchef',[AdminController::class,'uploadchef'])->name('uploadchef');
Route::get('/updatechefview/{id}',[AdminController::class,'updatechefview'])->name('updatechefview'); 
Route::post('/updatefoodchef/{id}',[AdminController::class,'updatefoodchef'])->name('updatefoodchef');
Route::get('/deletechef/{id}',[AdminController::class,'deletechef'])->name('deletechef');
Route::post('/addcart/{id}',[HomeController::class,'addcart'])->name('addcart');
Route::get('/showcart/{id}',[HomeController::class,'showcart'])->name('showcart');
Route::get('/remove/{id}',[HomeController::class,'remove'])->name('remove');

Route::get('/orders',[AdminController::class,'orders'])->name('orders');

Route::get('/search',[AdminController::class,'search'])->name('search');

Route::post('/orderconfirm',[HomeController::class,'orderconfirm'])->name('orderconfirm');

Route::post('/reservation',[AdminController::class,'reservation'])->name('reservation');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
