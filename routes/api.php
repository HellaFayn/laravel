<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CacaoController;
use App\Http\Controllers\DownloadLinksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'authLogin']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/resend-verification', [AuthController::class, 'sendVerification']);
Route::get('download/latest', [DownloadLinksController::class, 'getLatest']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('auth/logout', [AuthController::class, 'authLogout']);
    Route::apiResources([
        'cacao' => CacaoController::class,
        'user' => UserController::class,
        'download_link' =>DownloadLinksController::class
    ]);

    //User
    Route::get('user', [UserController::class, 'getMany']);
    Route::get('user/{user}', [UserController::class, 'getOne']);
    Route::get('current/user', [UserController::class, 'getCurrentUser']);
    Route::get('user/count/all', [UserController::class, 'getUserCount']);
    Route::get('user/count/today', [UserController::class, 'getUserSignToday']);

    //DownloadLinks
    Route::get('download/latest/date', [DownloadLinksController::class, 'getLatestDate']);

    //Cacao
    Route::get('cacao/upload/today', [CacaoController::class, 'getUploadedTodayCount']);
    Route::get('cacao/recent/upload', [CacaoController::class, 'getRecent']);
    Route::get('cacao/status/count', [CacaoController::class, 'getStatusCount']);
    Route::get('cacao/disease/weeks', [CacaoController::class, 'getHighestDiseaseWithinTheWeek']);
    Route::get('cacao/upload/count/{id}', [CacaoController::class, 'getUploadCountByUser']);
    Route::get('cacao/user/upload/{id}', [CacaoController::class, 'getCacaoUploadedByUser']);
    Route::get('cacao/feed/{order}/{filter}', [CacaoController::class, 'index']);
    Route::get('cacao/heatmap/{filter}', [CacaoController::class, 'getHeatMapData']);
});

