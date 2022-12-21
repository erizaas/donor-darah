<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloodController;


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

// Route::get('/', function () {
//     return view('dashbord');
// });

Route::get('/', [BloodController::class,'index']);
Route::get('/edit', [BloodController::class,'edit']);
Route::get('/dashboard', [BloodController::class,'dashboard']);
Route::get('/create', [BloodController::class,'create']);
Route::post('/create', [BloodController::class,'store'])->name('store');
Route::get('/edit/{id}', [BloodController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [BloodController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [BloodController::class, 'destroy'])->name('destroy');

