<?php

use Illuminate\Support\Facades\Route;

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

// controller admin route
use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\FrontCtrl;
use App\Http\Controllers\MemberCtrl;

use App\Http\Controllers\PengunjungCtrl;
use App\Http\Controllers\LoginCtrl;



// Login
Route::get('/login', [LoginCtrl::class,'index']);
Route::post('/login/cek', [LoginCtrl::class,'cek_login']);

Route::get('/logout', [LoginCtrl::class,'logout']);

Route::post('/daftar/act', [LoginCtrl::class,'daftar_act']);

/*
--------------------------------------------- 
Bagian besar front
---------------------------------------------
*/
Route::get('/', [FrontCtrl::class,'index']);
// Route::get('/front/index', [FrontCtrl::class,'index']);







/*
--------------------------------------------- 
Bagian besar admin
---------------------------------------------
*/

Route::get('/dashboard/admin',[AdminCtrl::class,'index']);


// Paket

Route::get('/dashboard/paket/data', [AdminCtrl::class,'paket_data']);
Route::post('/dashboard/paket/act', [AdminCtrl::class,'paket_act']);
Route::get('/dashboard/paket/edit/{id}', [AdminCtrl::class,'paket_edit']);
Route::post('/dashboard/paket/update', [AdminCtrl::class,'paket_update']);
Route::get('/dashboard/paket/delete/{id}', [AdminCtrl::class,'paket_delete']);


//pengunjjung
Route::get('/dashboard/pengunjung/data', [AdminCtrl::class,'pengunjung_data']);
Route::get('/dashboard/pengunjung/add', [AdminCtrl::class,'pengunjung_add']);

Route::post('/dashboard/pengunjung/act', [AdminCtrl::class,'pengunjung_act']);
Route::get('/dashboard/pengunjung/edit/{id}', [AdminCtrl::class,'pengunjung_edit']);
Route::post('/dashboard/pengunjung/update', [AdminCtrl::class,'pengunjung_update']);
Route::get('/dashboard/pengunjung/delete/{id}', [AdminCtrl::class,'pengunjung_delete']);


//member
Route::get('/dashboard/member/data', [AdminCtrl::class,'member_data']);
Route::post('/dashboard/member/act', [AdminCtrl::class,'member_act']);
Route::get('/dashboard/member/edit/{id}', [AdminCtrl::class,'member_edit']);
Route::post('/dashboard/member/update', [AdminCtrl::class,'member_update']);
Route::get('/dashboard/member/delete/{id}', [AdminCtrl::class,'member_delete']);


// pennjaga
//pengunjjung
Route::get('/dashboard/penjaga/data', [AdminCtrl::class,'penjaga_data']);
Route::get('/dashboard/penjaga/add', [AdminCtrl::class,'penjaga_add']);

Route::post('/dashboard/penjaga/act', [AdminCtrl::class,'penjaga_act']);
Route::get('/dashboard/penjaga/edit/{id}', [AdminCtrl::class,'penjaga_edit']);
Route::post('/dashboard/penjaga/update', [AdminCtrl::class,'penjaga_update']);
Route::get('/dashboard/penjaga/delete/{id}', [AdminCtrl::class,'penjaga_delete']);


//absensi
Route::get('/dashboard/absensi/data', [AdminCtrl::class,'absensi_data']);
Route::post('/dashboard/absensi/act', [AdminCtrl::class,'absensi_act']);
Route::get('/dashboard/absensi/edit/{id}', [AdminCtrl::class,'absensi_edit']);
Route::post('/dashboard/absensi/update', [AdminCtrl::class,'absensi_update']);
Route::get('/dashboard/absensi/delete/{id}', [AdminCtrl::class,'absensi_delete']);




//konfirmasi pembayaran
Route::get('/dashboard/pembayaran/data', [AdminCtrl::class,'pembayaran_data']);
Route::get('/dashboard/pembayaran/edit/{id}', [AdminCtrl::class,'pembayaran_edit']);
Route::post('/dashboard/pembayaran/update', [AdminCtrl::class,'pembayaran_update']);
Route::get('/dashboard/pembayaran/delete/{id}', [AdminCtrl::class,'pembayaran_delete']);

Route::post('/ajax/konfirmasi', [AdminCtrl::class,'konfirmasi_bayar']);





// cek ajax absensi member atau bukan
Route::post('/ajax/cek_member', [AdminCtrl::class,'cek_member']);


/*
--------------------------------------------- 
Bagian besar member
---------------------------------------------
*/
Route::get('/dashboard/member',[MemberCtrl::class,'index']);

Route::post('/dashboard/member/beli',[MemberCtrl::class,'beli_act']);






// --------------------------------------------------

// role 
Route::get('/dashboard/role/data', [AdminCtrl::class,'role']);
Route::post('/dashboard/role/act', [AdminCtrl::class,'role_act']);

Route::get('/dashboard/role/edit/{id}', [AdminCtrl::class,'role_edit']);
Route::post('/dashboard/role/update', [AdminCtrl::class,'role_update']);

// profile ubah password
Route::get('/dashboard/pengaturan/data', [AdminCtrl::class,'pengaturan']);
Route::post('/dashboard/pengaturan/update', [AdminCtrl::class,'pengaturan_update']);

