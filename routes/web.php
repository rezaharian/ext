<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BosController;
use App\Http\Controllers\DashboardSuperAdminController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\JalurController;

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

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// untuk superadmin, bos dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);

    //menambahkan field master shift
    route::post('/store-input-fields-master', [DataMasterController::class, 'store']);
});

// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/superadmin', [SuperadminController::class, 'index']);
    Route::get('/superadmin/dashboard', [DashboardSuperAdminController::class, 'index']);

    //user
    route::get('/superadmin/dashboard/user', [DashboardSuperAdminController::class, 'indexUser'])->name('superadmin.user.index');
    route::post('/superadmin/dashboard/user/store', [DashboardSuperAdminController::class, 'storeUser']);
    route::delete('/superadmin/dashboard/user/destroy/{id}', [DashboardSuperAdminController::class, 'destroyUser'])->name('superadmin.destroy.user');
    route::get('/superadmin/dashboard/user/edit/{id}', [DashboardSuperAdminController::class, 'editUser'])->name('superadmin.edit.user');
    route::post('/superadmin/dashboard/user/update/{id}', [DashboardSuperAdminController::class, 'updateUser'])->name('superadmin.update.user');
  
    //profile
    route::get('/superadmin/dashboard/profile', [DashboardSuperAdminController::class, 'profileAdmin'])->name('superadmin.dashboard.profile');

    //LogBook
    route::get('/superadmin/dashboard/loogbok/{jalur_id}/data', [DashboardSuperAdminController::class, 'indexData'])->name('superadmin.index.data');
    route::get('/superadmin/dashboard/logbook/{jalur_id}/pencarian', [DashboardSuperAdminController::class, 'indexCariData'])->name('superadmin.index.cari.data');
    route::post('/superadmin/dashboard/loogbok/{jalur_id}/update/{data}', [DashboardSuperAdminController::class, 'update'])->name('superadmin.update.data');
    route::get('/superadmin/dashboard/loogbok/{jalur_id}/reset/{data}', [DashboardSuperAdminController::class, 'reset'])->name('superadmin.reset.data');
    route::get('/superadmin/dashboard/loogbok/{jalur_id}/batalresetpcs/{data}', [DashboardSuperAdminController::class, 'batalresetpcs'])->name('superadmin.batalresetpcs.data');
    route::get('/superadmin/dashboard/loogbok/{jalur_id}/batalresetpcsfresh/{data}', [DashboardSuperAdminController::class, 'batalresetpcsrefresh'])->name('superadmin.batalresetpcsrefresh.data');
    route::get('/superadmin/dashboard/loogbok/{jalur_id}/resetwaktu/{data}', [DashboardSuperAdminController::class, 'resetwaktu'])->name('superadmin.resetwaktu.data');
    route::get('/superadmin/dashboard/loogbok/{jalur_id}/batalresettime/{data}', [DashboardSuperAdminController::class, 'batalresettime'])->name('superadmin.batalresettime.data');
    route::post('/superadmin/dashboard/loogbok/insertfielddata/{jalur_id}',[DashboardSuperAdminController::class, 'insertfielddata'])->name('superadmin.insertfielddata.data');
    route::get('/superadmin/dashboard/loogbok/delete/{jalur_id}', [DashboardSuperAdminController::class, 'deleteTmpData'])->name('superadmin.delete.data');


    //jalur
    route::get('/superadmin/dashboard/loogbok/line',[DashboardSuperAdminController::class, 'lineloogbok'])->name('superadmin.line.data');
    route::post('/superadmin/dashboard/jalur/store',[DashboardSuperAdminController::class, 'storeJalur'])->name('superadmin.line.store');

});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/pegawai', [PegawaiController::class, 'index']);
});

// untuk bos
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/bos', [BosController::class, 'index']);
});
