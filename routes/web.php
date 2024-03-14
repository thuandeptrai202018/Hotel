<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GiaPhongController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThongTinKhachSanController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TestController::class, 'index']);

Route::group(['prefix' => '/admin'], function() {

    Route::group(['prefix' => '/thong-tin-khach-san'], function() {
        Route::get('/index', [ThongTinKhachSanController::class, 'index']);
        Route::post('/create', [ThongTinKhachSanController::class, 'store']);
        Route::get('/data', [ThongTinKhachSanController::class, 'data']);
    });


    Route::group(['prefix' => '/loai-phong'], function() {
        Route::get('/index', [LoaiPhongController::class, 'index']);
        Route::post('/create', [LoaiPhongController::class, 'store']);
        Route::get('/data', [LoaiPhongController::class, 'data']);
        Route::post('/delete', [LoaiPhongController::class, 'destroy']);
        Route::post('/update', [LoaiPhongController::class, 'update']);
    });

    Route::group(['prefix' => '/gia-phong'], function() {
        Route::get('/index', [GiaPhongController::class, 'index']);
        Route::post('/create', [GiaPhongController::class, 'store']);
        Route::get('/data', [GiaPhongController::class, 'data']);
        Route::post('/delete', [GiaPhongController::class, 'destroy']);
        Route::post('/update', [GiaPhongController::class, 'update']);
    });


    Route::group(['prefix' => '/phong'], function() {
        Route::get('/index', [PhongController::class, 'index']);
        Route::post('/create', [PhongController::class, 'store']);
        Route::get('/data', [PhongController::class, 'data']);
        Route::post('/delete', [PhongController::class, 'destroy']);
        Route::post('/update', [PhongController::class, 'update']);
    });

    Route::group(['prefix' => '/tai-khoan'], function() {
        Route::get('/index', [AdminController::class, 'index']);
        Route::post('/create', [AdminController::class, 'store']);
        Route::get('/data', [AdminController::class, 'data']);
        Route::post('/delete', [AdminController::class, 'destroy']);
        Route::post('/update', [AdminController::class, 'update']);
    });
});



