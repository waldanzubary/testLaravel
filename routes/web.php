<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');


Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');


Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');


Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');


Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');


Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');



Route::prefix('customers/{customerId}')->group(function () {
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('contacts/{contactId}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('contacts/{contactId}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{contactId}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});


Route::get('contact', [ContactController::class, 'contact'])->name('customers.contact');





Route::get('Warehouse', [ItemController::class, 'Warehouse']);
Route::get('Warehouse/create', [ItemController::class, 'CreateIndex'])->name('items.create');
Route::post('items', [ItemController::class, 'store'])->name('items.store');
Route::get('/warehouse/{id}/edit', [ItemController::class, 'edit'])->name('warehouse.edit');
Route::put('/warehouse/{id}', [ItemController::class, 'update'])->name('warehouse.update');
Route::delete('/warehouse/{id}', [ItemController::class, 'destroy'])->name('warehouse.destroy');



// Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
// Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');
// Route::post('sales', [SaleController::class, 'store'])->name('sales.store');
// Route::get('sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
// Route::put('sales/{id}', [SaleController::class, 'update'])->name('sales.update');
// Route::delete('sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');


Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::put('sales/{id}', [SaleController::class, 'update'])->name('sales.update');
Route::delete('sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');


Route::get('/sales/report', [SaleController::class, 'reportForm'])->name('sales.report.form');
Route::post('/sales/report', [SaleController::class, 'generateReport'])->name('sales.report');
