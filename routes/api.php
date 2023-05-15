<?php

use App\Http\Controllers\Api\V1\{TestController, BuildingController, UserController, ReviewController, CategoryController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->name('v1.')->group(function () {
    Route::get('/test2', [TestController::class, 'test2']);

    Route::get('/test_list', [TestController::class, 'test']);
    Route::get('/catalog', [CategoryController::class, 'index']);
    Route::get('/category/{category}', [CategoryController::class, 'show']);

    Route::get('/building', [BuildingController::class, 'index']);
    Route::get('/building/review', [BuildingController::class, 'review']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/review', [ReviewController::class, 'index']);
    Route::get('/review/list', [ReviewController::class, 'list']);
    Route::get('/review/report', [ReviewController::class, 'report']);

    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/roles',  [App\Http\Controllers\Api\V1\RolesController::class, 'index']);
        Route::get('/permissions',  [App\Http\Controllers\Api\V1\PermissionsController::class, 'index']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
