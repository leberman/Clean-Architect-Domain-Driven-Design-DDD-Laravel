<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Posts\IndexController;
use App\Http\Controllers\Api\V1\Posts\ShowController;
use App\Http\Controllers\Api\V1\Posts\StoreController;
use App\Http\Controllers\Api\V1\Posts\UpdateController;
use App\Http\Controllers\Api\V1\Posts\DeleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('posts')->as('posts:')->group(callback: function () {
    Route::get('/', IndexController::class)->name('index'); // [api:v1:posts:index]
    Route::post('/', StoreController::class)->name('store'); // [api:v1:posts:store]
    Route::delete('/{id}', DeleteController::class)->name('delete'); // [api:v1:posts:delete]
    Route::patch('/{id}', UpdateController::class)->name('update'); // [api:v1:posts:update]
    Route::get('/{post:id}/{slug}', ShowController::class)->name('show'); // [api:v1:posts:show]
});
