<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\AdminCraftController;

// Halaman utama marketplace
Route::get('/', [CraftController::class, 'index'])
    ->name('crafts.index');

// Halaman detail produk
Route::get('/crafts/{id}', [CraftController::class, 'show'])
    ->name('crafts.show');

// Halaman admin untuk mengelola produk
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/crafts', [AdminCraftController::class, 'index'])
        ->name('crafts.index');

    Route::get('/crafts/create', [AdminCraftController::class, 'create'])
        ->name('crafts.create');

    Route::post('/crafts', [AdminCraftController::class, 'store'])
        ->name('crafts.store');

    Route::get('/crafts/{craft}/edit', [AdminCraftController::class, 'edit'])
        ->name('crafts.edit');

    Route::put('/crafts/{craft}', [AdminCraftController::class, 'update'])
        ->name('crafts.update');

    Route::delete('/crafts/{craft}', [AdminCraftController::class, 'destroy'])
        ->name('crafts.destroy');
});
