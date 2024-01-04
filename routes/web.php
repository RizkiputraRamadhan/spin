<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UndiController;
use App\Http\Controllers\HadiahController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemenangController;

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

Route::get('/', [UndiController::class, 'index']);
Route::post('/undi', [UndiController::class, 'undi']);

Route::middleware('auth')->group(function () {
    Route::get('pembeli', [PembeliController::class, 'index']);
    Route::get('pembeli/create', [PembeliController::class, 'create']);
    Route::post('pembeli/store', [PembeliController::class, 'store']);
    Route::delete('pembeli/delete/{id}', [PembeliController::class, 'delete']);

    Route::get('hadiah', [HadiahController::class, 'index'])->name('hadiah.index');
    Route::get('hadiah/create', [HadiahController::class, 'create'])->name('hadiah.create');
    Route::post('hadiah/store', [HadiahController::class, 'store'])->name('hadiah.store');
    Route::get('/api/hadiah-list', [HadiahController::class, 'getHadiahList']);
    Route::delete('hadiah/{id}', [HadiahController::class, 'destroy'])->name('hadiah.destroy');

    Route::get('pemenang', [PemenangController::class, 'index'])->name('pemenang.index');
    Route::get('pemenang/create', [PemenangController::class, 'create'])->name('pemenang.create');
    Route::post('pemenang/store', [PemenangController::class, 'store'])->name('pemenang.store');
    Route::delete('pemenang/{id}', [PemenangController::class, 'destroy'])->name('pemenang.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
