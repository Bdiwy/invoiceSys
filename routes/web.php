<?php

use App\Http\Controllers\AddProdController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Models\AddProd;
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
    Route::resource('add-product', AddProdController::class);
    Route::post('update',[ AddProdController::class,'update'])->name('update');
    Route::post('delete',[ AddProdController::class,'destroy'])->name('delete');
    Route::resource('ListOfInvoices', InvoicesController::class);
    Route::resource('add-sections', SectionsController::class);
    Route::get('/destroy/{id}', [SectionsController::class,'destroy']);
    Route::post('/update-sec', [SectionsController::class,'edit'])->name('edit');
    Route::post('/update/{id}', [SectionsController::class,'update']);
    Route::get('/add-invoic', [SectionsController::class,'show']);
    
    
    
    Route::post('/add-sections/create', [SectionsController::class,'create'])->name('create.section');
    





Route::get('/{page}', [AdminController::class,'index']);

Route::get('/reset', [AdminController::class,'resetpass'])->name('password.reset');

