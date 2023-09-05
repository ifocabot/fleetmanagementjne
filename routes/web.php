<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\oddoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [oddoController::class, 'index']);
route::get('/oddoOut',[oddoController::class,'oddoOutView'])->name('oddoOutForm');;
Route::post('/oddoOut/store', [oddoController::class,'oddoOutStore'])->name('oddoOut.store');
route::get('/oddoIn',[oddoController::class,'oddoInView'])->name('oddoInForm');
Route::post('/oddoIn/store', [oddoController::class,'oddoInStore'])->name('oddoIn.store');
