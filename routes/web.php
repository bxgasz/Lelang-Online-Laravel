<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HistoryLelangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UplodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::group(['middleware' => 'disable_back_btn'], function() {
    Route::group(['middleware' => 'auth:user'], function() {
    
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile', [ProfileController::class, 'indexPetugas'])->name('petugas.profile');
        Route::post('/profile', [ProfileController::class, 'updateProfilPetugas'])->name('petugas.profile.update');
    
        Route::resource('/barang', BarangController::class);
        Route::get('/barang-d', [BarangController::class, 'data'])->name('barang.data');
        Route::match(['put', 'patch'], 'barang-status/{id}', [BarangController::class, 'updateStatus'])->name('barang.status');
        Route::get('/barang-paginate', [BarangController::class, 'paginate']);
    
        Route::group(['middleware' => 'cekRole:1'], function(){
            // Route::get('/adm', function () {
            //     return view('petugas.admin.index');
            // });
    
            // Route::post('/adm/file-uplod', [UplodController::class, 'store'])->name('file.upload');
            // Route::delete('/adm/file-delete', [UplodController::class, 'delete'])->name('file.delete');
            // Route::get('/adm/file-load/{$id}', [UplodController::class, 'load'])->name('file.load');
    
            // Route::resource('/adm/lelang', LelangController::class);
            // Route::get('/adm/lelang-form', [LelangController::class, 'form'])->name('lelang.form');
            // Route::get('/adm/lelang-buka', [LelangController::class, 'lelangBuka'])->name('lelang.buka');
            // Route::get('/adm/lelang-baru', [LelangController::class, 'lelangTutup'])->name('lelang.tutup');
            // Route::get('/adm/lelang-databuka', [LelangController::class, 'dataBuka'])->name('lelang.dataBuka');
            // Route::get('/adm/lelang-datatutup', [LelangController::class, 'dataTutup'])->name('lelang.dataTutup');
            // Route::match(['put', 'patch'],'/adm/lelang-status/{id}', [LelangController::class, 'editStatus'])->name('lelang.status');
    
            // Route::resource('/adm/history', HistoryLelangController::class);
            // Route::get('/adm/history-d', [HistoryLelangController::class, 'data'])->name('history.data');
    
            Route::resource('/user', UserController::class);
            Route::get('/user-d', [UserController::class, 'data'])->name('user.data');
            Route::get('/user-paginate', [UserController::class, 'paginate']);
    
            Route::resource('/masyarakat', MasyarakatController::class);
            Route::get('/masyarakat-d', [MasyarakatController::class, 'data'])->name('masyarakat.data');
            Route::get('/masyarakat-paginate', [MasyarakatController::class, 'paginate']);
    
        }); 
    
        Route::get('/laporan-pdf', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan-pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.pdf');
        Route::get('/laporan-d/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
    
        Route::group(['middleware' => 'cekRole:2'], function(){
            Route::resource('/lelang', LelangController::class);
            Route::get('/lelang-form', [LelangController::class, 'form'])->name('lelang.form');
            Route::get('/lelang-buka', [LelangController::class, 'lelangBuka'])->name('lelang.buka');
            Route::get('/lelang-baru', [LelangController::class, 'lelangTutup'])->name('lelang.tutup');
            Route::get('/lelang-databuka', [LelangController::class, 'dataBuka'])->name('lelang.dataBuka');
            Route::get('/paginate-databuka', [LelangController::class, 'paginateBuka']);
            Route::get('/lelang-datatutup', [LelangController::class, 'dataTutup'])->name('lelang.dataTutup');
            Route::get('/paginate-datatutup', [LelangController::class, 'paginateTutup']);
            Route::match(['put', 'patch'],'/lelang-status/{id}', [LelangController::class, 'editStatus'])->name('lelang.status');
    
            Route::get('/send-email/{id}', [EmailController::class, 'sendEmail'])->name('send.email');
    
            Route::resource('/history', HistoryLelangController::class);
            Route::get('/history-d', [HistoryLelangController::class, 'data'])->name('history.data');
        });    
    });
    
    Route::group(['middleware' => 'auth:masyarakat'], function() {
        // Route::get('/masy', function () {
        //     return view('masyarakat.home');
        // });
        // Route::get('/masy', [BiddingController::class, 'index']);
        Route::get('/masy/riwayat/{id}', [BiddingController::class, 'showDetail'])->name('masy.showdetail');
        Route::get('/masy/riwayat', [BiddingController::class, 'riwayatLelang'])->name('masy.riwayat');
        Route::get('/masy/riwayat-pembayaran', [BiddingController::class, 'riwayatPembayaran'])->name('riwayat.pembayaran');
    
        Route::get('/masy/profile', [BiddingController::class, 'profile'])->name('masy.profile');
        Route::post('/masy/profile', [ProfileController::class, 'updateProfil'])->name('masy.profile.update');
    
        Route::resource('/masy', BiddingController::class);
    });
});

Route::get('/', [BiddingController::class, 'index'])->name('masy.index');
Route::get('/masy/all/product', [BiddingController::class, 'all'])->name('masy.all');
Route::get('/masy/{masy}', [BiddingController::class, 'show'])->name('masy.show');

Route::resource('/login', AuthController::class);
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('auth.proses');
