
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CraftController;

// Halaman utama: menampilkan daftar produk dari database
Route::get('/', [CraftController::class, 'index'])
    ->name('crafts.index');

// Halaman detail produk
Route::get('/crafts/{id}', [CraftController::class, 'show'])
    ->name('crafts.show');
