<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
