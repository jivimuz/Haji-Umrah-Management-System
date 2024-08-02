<?php

use App\Http\Controllers\Website\AgenController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ModuleController;
use App\Http\Controllers\Website\UserListController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\PaketController;
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


    Route::middleware(['checkAccess:MTA'])->prefix('access')->group(function () {
        Route::get('/', [ModuleController::class, 'index']);
        Route::post('getMenuList', [ModuleController::class, 'getMenuList']);
        Route::post('saveAccess', [ModuleController::class, 'saveAccess']);
    });

    Route::middleware(['checkAccess:MTU'])->prefix('users')->group(function () {
        Route::get('/', [UserListController::class, 'index']);
        Route::post('getList', [UserListController::class, 'getList']);
        Route::post('add', [UserListController::class, 'add']);
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
});
