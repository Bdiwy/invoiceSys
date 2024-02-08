<?php

use App\Models\AddProd;
use App\Models\invoices;
use App\Models\invoices_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddProdController;
use App\Http\Controllers\InvoiceAttachmentController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoicesDetailsController;

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
    

    Route::resource('InvoiceAttachments', InvoiceAttachmentController::class);

    Route::post('/add-sections/create', [SectionsController::class,'create'])->name('create.section');
    

    Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);
    Route::post('invoices/update', [InvoicesController::class,'update']);




Route::get('/{page}', [AdminController::class,'index']);
Route::get('/section/{id}', [InvoicesController::class,'getproducts']);

Route::get('/reset', [AdminController::class,'resetpass'])->name('password.reset');
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class,'edit']);


Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');

Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);



Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');
