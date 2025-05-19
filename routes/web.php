<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ListsController;
use Illuminate\Support\Facades\Route;;

//Lists
Route::get('/', [ListsController::class, 'index'])->name('lists.index');
Route::get('create', [ListsController::class, 'create'])->name('lists.create');
Route::post('store', [ListsController::class, 'store'])->name('lists.store');
Route::get('show/{id}', [ListsController::class, 'show'])->name('lists.show');
Route::delete('delete/{id}', [ListsController::class, 'destroy'])->name('lists.destroy');

//Items
Route::post('items/{item}/complete', [ItemsController::class, 'completeItem'])->name('items.complete');
Route::post('items', [ItemsController::class, 'store'])->name('items.store');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
