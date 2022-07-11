<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Posts\IndexController;
use App\Http\Controllers\Api\V1\Posts\ShowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('posts')->as('posts:')->group(function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/{post:id}/{slug}', ShowController::class)->name('show');
});
