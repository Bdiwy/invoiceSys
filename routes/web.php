<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Models\invoices;

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
    return view('index');
})->middleware('auth');

Auth::routes();
Route::resource('ListOfInvoices', InvoicesController::class);
Route::resource('add-sections', SectionsController::class);




Route::get('/{page}', [AdminController::class,'index']);

Route::get('/reset', [AdminController::class,'resetpass'])->name('password.reset');


