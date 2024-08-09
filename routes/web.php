<?php

use App\Http\Controllers\Website\AgenController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ModuleController;
use App\Http\Controllers\Website\UserListController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\JamaahController;
use App\Http\Controllers\Website\PaketController;
use App\Http\Controllers\website\PaymentController;
use App\Http\Controllers\Website\PrintController;
use App\Http\Controllers\Website\profileController;
use App\Http\Controllers\Website\SettingController;
use App\Http\Middleware\CheckModuleAccess;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('error', [AuthController::class, 'error'])->name('error');

//Group By Auth
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('menu', [HomeController::class, 'menu']);
    Route::post('getJamaahInYear', [HomeController::class, 'getJamaahInYear']);
    Route::post('getTopAgen', [HomeController::class, 'getTopAgen']);
    Route::post('get40Days', [HomeController::class, 'get40Days']);

    Route::prefix('profile')->group(function () {
        Route::post('changePassword', [profileController::class, 'changePassword']);
    });


    Route::middleware(['checkAccess:MTA'])->prefix('access')->group(function () {
        Route::get('/', [ModuleController::class, 'index']);
        Route::post('getMenuList', [ModuleController::class, 'getMenuList']);
        Route::post('saveAccess', [ModuleController::class, 'saveAccess']);
    });

    Route::middleware(['checkAccess:MTU'])->prefix('users')->group(function () {
        Route::get('/', [UserListController::class, 'index']);
        Route::post('getList', [UserListController::class, 'getList']);
        Route::post('add', [UserListController::class, 'add']);
        Route::post('edit', [UserListController::class, 'edit']);
        Route::post('cekEmail', [UserListController::class, 'cekEmail']);
        Route::post('cekUsername', [UserListController::class, 'cekUsername']);
        Route::post('saveData', [UserListController::class, 'saveData']);
        Route::post('updateData', [UserListController::class, 'updateData']);
        Route::post('activateUser', [UserListController::class, 'activateUser']);
        Route::post('deactivateUser ', [UserListController::class, 'deactivateUser']);
    });

    Route::middleware(['checkAccess:AGN'])->prefix('agen')->group(function () {
        Route::get('/', [AgenController::class, 'index']);
        Route::post('getList', [AgenController::class, 'getList']);
        Route::post('add', [AgenController::class, 'add']);
        Route::post('saveAgen', [AgenController::class, 'saveAgen']);
        Route::post('edit', [AgenController::class, 'edit']);
        Route::post('updateAgen', [AgenController::class, 'updateAgen']);
        Route::post('delete', [AgenController::class, 'delete']);
    });

    Route::middleware(['checkAccess:PKT'])->prefix('paket')->group(function () {
        Route::get('/', [PaketController::class, 'index']);
        Route::post('getList', [PaketController::class, 'getList']);
        Route::post('add', [PaketController::class, 'add']);
        Route::post('saveData', [PaketController::class, 'saveData']);
        Route::post('edit', [PaketController::class, 'edit']);
        Route::post('updateData', [PaketController::class, 'updateData']);
        Route::post('delete', [PaketController::class, 'delete']);
    });

    Route::middleware(['checkAccess:JMA'])->prefix('jamaah')->group(function () {
        Route::get('/', [JamaahController::class, 'index']);
        Route::post('getList', [JamaahController::class, 'getList']);
        Route::post('addUmrah', [JamaahController::class, 'addUmrah']);
        Route::post('addHaji', [JamaahController::class, 'addHaji']);
        Route::post('saveData', [JamaahController::class, 'saveData']);
        Route::post('edit', [JamaahController::class, 'edit']);
        Route::post('updateData', [JamaahController::class, 'updateData']);
        Route::post('delete', [JamaahController::class, 'delete']);
        Route::post('payment', [JamaahController::class, 'payment']);
        Route::post('getListPayment', [JamaahController::class, 'getListPayment']);
    });

    Route::middleware(['checkAccess:PAY'])->prefix('payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index']);
        Route::post('getList', [PaymentController::class, 'getList']);
        Route::post('add', [PaymentController::class, 'add']);
        Route::post('getJamaahHistory', [PaymentController::class, 'getJamaahHistory']);
        Route::post('outTransaction', [PaymentController::class, 'outTransaction']);
        Route::post('pengeluaran', [PaymentController::class, 'pengeluaran']);
        Route::post('refund', [PaymentController::class, 'refund']);
        Route::post('saveData', [PaymentController::class, 'saveData']);
    });

    Route::middleware(['checkAccess:SET'])->prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index']);
        Route::post('getParameter', [SettingController::class, 'getParameter']);
        Route::post('saveSettingD', [SettingController::class, 'saveSettingD']);
        Route::post('saveSettingF', [SettingController::class, 'saveSettingF']);
    });

    Route::prefix('print')->group(function () {
        Route::get('kwitansi/{id}', [PrintController::class, 'kwitansi']);
        Route::get('manifest/{id}', [PrintController::class, 'manifest']);
        Route::get('monthlyReport', [PrintController::class, 'monthlyReport']);
    });
});
