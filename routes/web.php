<?php

use App\Http\Controllers\KasMasjidController;
use App\Http\Controllers\KasSosialController;
use App\Models\KasMasjid;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route pemasukan kas masjid 
Route::get('/kas-masjid', [KasMasjidController::class, 'index'])->name('kas-masjid');
Route::get('/kas-masjid/tambah-data', [KasMasjidController::class, 'create'])->name('kas-masjid.tambah-data');
Route::post('/kas-masjid/store', [KasMasjidController::class, 'store'])->name('kas-masjid.store');
Route::get('/kas-masjid/edit/{id}', [KasMasjidController::class, 'edit'])->name('kas-masjid.edit');
Route::delete('/kas-masjid/destroy/{id}', [KasMasjidController::class, 'destroy'])->name('kas-masjid.destroy');
Route::patch('/kas-masjid/update/{id}', [KasMasjidController::class, 'update'])->name('kas-masjid.update');

// Route pengeluaran kas masjid
Route::get('/kas-masjid/pengeluaran', [KasMasjidController::class, 'indexPengeluaran'])->name('kas-masjid.pengeluaran');
Route::get('/kas-masjid/pengeluaran/tambah-data', [KasMasjidController::class, 'createPengeluaran'])->name('kas-masjid.tambah-data.pengeluaran');
Route::post('/kas-masjid/store/pengeluaran', [KasMasjidController::class, 'storePengeluaran'])->name('kas-masjid.store.pengeluaran');
Route::get('/kas-masjid/edit/pengeluaran/{id}', [KasMasjidController::class, 'editPengeluaran'])->name('kas-masjid.edit.pengeluaran');
Route::delete('/kas-masjid/destroy/pengeluaran/{id}', [KasMasjidController::class, 'destroyPengeluaran'])->name('kas-masjid.destroy.pengeluaran');
Route::patch('/kas-masjid/update/pengeluaran/{id}', [KasMasjidController::class, 'updatePengeluaran'])->name('kas-masjid.update.pengeluaran');

// Route laporan kas masjid
Route::get('/kas-masjid/laporan', [KasMasjidController::class, 'indexLaporan'])->name('kas-masjid.laporan');
Route::delete('/kas-masjid/destroy/laporan/{id}', [KasMasjidController::class, 'destroyLaporan'])->name('kas-masjid.destroy.laporan');



// Route Pemasukan Kas Sosial
Route::get('/kas-sosial', [KasSosialController::class, 'index'])->name('kas-sosial');
Route::get('/kas-sosial/tambah-data', [KasSosialController::class, 'create'])->name('kas-sosial.tambah-data');
Route::post('/kas-sosial/store', [KasSosialController::class, 'store'])->name('kas-sosial.store');
Route::get('/kas-sosial/edit/{id}', [KasSosialController::class, 'edit'])->name('kas-sosial.edit');
Route::delete('/kas-sosial/destroy/{id}', [KasSosialController::class, 'destroy'])->name('kas-sosial.destroy');
Route::patch('/kas-sosial/update/{id}', [KasSosialController::class, 'update'])->name('kas-sosial.update');

// Route Pengeluaran Kas Sosial
Route::get('/kas-sosial/pengeluaran', [KasSosialController::class, 'indexPengeluaran'])->name('kas-sosial.pengeluaran');
Route::get('/kas-sosial/pengeluaran/tambah-data', [KasSosialController::class, 'createPengeluaran'])->name('kas-sosial.tambah-data.pengeluaran');
Route::post('/kas-sosial/store/pengeluaran', [KasSosialController::class, 'storePengeluaran'])->name('kas-sosial.store.pengeluaran');
Route::get('/kas-sosial/edit/pengeluaran/{id}', [KasSosialController::class, 'editPengeluaran'])->name('kas-sosial.edit.pengeluaran');
Route::delete('/kas-sosial/destroy/pengeluaran/{id}', [KasSosialController::class, 'destroyPengeluaran'])->name('kas-sosial.destroy.pengeluaran');
Route::patch('/kas-sosial/update/pengeluaran/{id}', [KasSosialController::class, 'updatePengeluaran'])->name('kas-sosial.update.pengeluaran');

// Route laporan kas sosial
Route::get('/kas-sosial/laporan', [KasSosialController::class, 'indexLaporan'])->name('kas-sosial.laporan');
Route::delete('/kas-sosial/destroy/laporan/{id}', [KasSosialController::class, 'destroyLaporan'])->name('kas-sosial.destroy.laporan');
