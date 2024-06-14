<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\petugas\PetugasController;
use App\Http\Controllers\auth\AuthController;

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

// Route::group(['middleware' => ['auth', 'role:admin']], function () {
Route::middleware('role:admin')->group(function () {
    Route::get('/admin', [PetugasController::class, 'dashboard'])->name('dashboardadmin');
    Route::get('/sirkulasi', [PetugasController::class, 'sirkulasi'])->name('sirkulasiadmin');
    Route::get('/karyawan', [PetugasController::class, 'karyawan'])->name('daftarkaryawan');
    Route::get('/tambahkunci', [PetugasController::class, 'tambahkunci'])->name('tambahkunci');
    Route::post('/posttambahkunci', [PetugasController::class, 'posttambahkunci'])->name('posttambahkunci');

    Route::get('/daftarkantor', [PetugasController::class, 'daftarkantor'])->name('daftarkantoradmin');    
    Route::get('/tambahkantor', [PetugasController::class, 'tambahkantor'])->name('tambahkantoradmin');    
    Route::post('/posttambahkantor', [PetugasController::class, 'posttambahkantor'])->name('posttambahkantoradmin'); 

    Route::get('/tambahkaryawan', [PetugasController::class, 'tambahkaryawan'])->name('tambahkaryawan'); 
    Route::post('/posttambahkaryawan', [PetugasController::class, 'posttambahkaryawan'])->name('posttambahkaryawan');
    
    Route::get('/delete/{kode_kantor}', [PetugasController::class, 'deletekantor'])->name('deletekantoradmin');


    Route::get('/download-pdf', [PdfController::class, 'downloadPDF'])->name('download.pdf');
});

Route::middleware('role:satpam')->group(function(){
    // Route::get('/satpam', [PetugasController::class, 'dashboardsatpam']);
    Route::get('/satpam', [PetugasController::class, 'dashboardsatpam'])->name('dashboardsatpam');
    Route::get('/sirkulasi_satpam', [PetugasController::class, 'sirkulasisatpam'])->name('sirkulasisatpam');

    Route::get('/formpinjam', [PetugasController::class, 'formpinjam'])->name('formpinjam');
    Route::post('/postsirkulasisatpam', [PetugasController::class, 'postform'])->name('postsirkulasisatpam');

    Route::get('/formpengembalian/{no_rotasi}', [PetugasController::class, 'formpengembalian'])->name('formpengembalian');
    Route::put('/postpengembalian/{id}', [PetugasController::class, 'postpengembalian'])->name('formpengembalian');


    Route::get('/cetak-pdf', [PdfController::class, 'downloadPDF'])->name('download.pdf');

});



Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

