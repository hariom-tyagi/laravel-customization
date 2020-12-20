<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\AudioController as AdminAudioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [AdminUserController::class, 'login']);
Route::post('admin/checkAdminLogin', [AdminUserController::class, 'checkAdminLogin']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('audios/index', [AdminAudioController::class, 'index']);
    Route::post('audios/getAudiosDatatable', [AdminAudioController::class, 'getAudiosDatatable']);
    Route::match(['get', 'post'], 'audios/audio/{audio_id?}', [AdminAudioController::class, 'audio']);
});


