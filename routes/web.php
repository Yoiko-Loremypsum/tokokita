<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KampanyeController;
use App\Http\Controllers\MahasiswaControler;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PasienController;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function(){
    return 'ini halaman about';
});
Route::get('/mahasiswa/{nim}',[MahasiswaControler::class,'show']);

Route::get('/mahasiswa',[MahasiswaControler::class,'index']);
Route::get('/user/{x?}', function($x=null){
    return 'USer: '.$x;
});
Route::get('/buku',[BukuController::class, 'index']);
Route::middleware('auth','akun:pustakawan')->group(function(){
    Route::get('buku/cetak_pdf', [bukuController::class, 'cetakPdf'])->name('buku.cetak_pdf');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');  
Route::get('/buku/edit/{id}',[BukuController::class,'edit']);
Route::put('/buku/{id}',[BukuController::class,'update']);
Route::delete('/buku/delete/{id}',[BukuController::class,'hapus']);
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

});
//Autentikasi
// Rute untuk tamu (Guest)
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticate']);
// // Rute logout menggunakan POST demi keamanan (mencegah CSRF Logout)
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Praktek tanggal 16 Maret
// Route ::get('/tentang',[TentangController::class,'index']);
// Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
// Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// Route::resource('produk', ProdukController::class);
// Route::middleware('auth', 'role:admin')->group(function(){
// //Praktek tanggal 30 Maret
// Route::get('Produk/cetak_pdf', [ProdukController::class, 'cetakPdf'])->name('produk.cetak_pdf');
// Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
// Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');

// Route::get('/produk/edit/{id}',[ProdukController::class,'edit']);
// Route::put('/produk/{id}',[ProdukController::class,'update']);
// Route::delete('/produk/delete/{id}',[ProdukController::class,'destroy']);

// });
//Autentikasi
// Rute untuk tamu (Guest)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
// Rute logout menggunakan POST demi keamanan (mencegah CSRF Logout)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//Kampanye
// Route::get('/kampanye', [KampanyeController::class, 'index']);
Route::get('/kampanye',[KampanyeController::class, 'index']);
Route::get('/kampanye/create',[KampanyeController::class, 'create']);
Route::post('/kampanye/store',[KampanyeController::class, 'store']);
Route::get('/kampanye/{id}/edit',[KampanyeController::class, 'edit']);
Route::put('/kampanye/{id}',[KampanyeController::class, 'update']);
Route::delete('/kampanye/{id}',[KampanyeController::class, 'destroy']);

Route::get('/pasien',[PasienController::class, 'index']);
Route::get('/pasien/create',[PasienController::class, 'create']);
Route::post('/pasien/',[PasienController::class, 'store']);
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit']);
Route::put('/pasien/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);