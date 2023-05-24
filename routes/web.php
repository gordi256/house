<?php

use App\Http\Controllers\{BuildingController, ProfileController, TestController, UserController, ReviewController, ItemController, CategoryController, DashboardController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test2', [TestController::class, 'test2'])->name('test.test2');
Route::get('/test_import', [TestController::class, 'import'])->name('test_import');
Route::get('/test', function () {
    return view('test');
})->middleware(['auth', 'verified'])->name('test');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::get('/catalog', [CategoryController::class, 'catalog'])->name('category.catalog');
    Route::resource('/item', ItemController::class);

    Route::resource('/building', BuildingController::class);
    Route::get('/building/{building}/review', [BuildingController::class, 'review'])->name('building.review');
    Route::resource('/review', ReviewController::class);

    Route::get('/review/{review}/report', [ReviewController::class, 'report'])->name('review.report');
    Route::get('/review/{review}/download', [ReviewController::class, 'download'])->name('review.download');
    Route::get('/review/{review}/report_download', [ReviewController::class, 'report_download'])->name('report.download');
    Route::get('/review/{review}/report_download_all', [ReviewController::class, 'report_download_all'])->name('report.download_all');
    
    Route::get('/review/{review}/download_photo', [ReviewController::class, 'download_photo'])->name('report.download_photo');
    Route::get('/review/{review}/confirm', [ReviewController::class, 'confirm'])->name('review.confirm');
    Route::post('/review/{review}/insert_data', [ReviewController::class, 'insert_data'])->name('review.insert_data');

    Route::resource('/user', UserController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::middleware('auth')->group(function () {

Route::prefix('/rap')->name('rap.')->group(function () {
    Route::resource('roles',  App\Http\Controllers\Admin\RolesController::class);
    Route::resource('permissions',  App\Http\Controllers\Admin\PermissionsController::class);
    Route::get('/', [App\Http\Controllers\Admin\RolesController::class, 'rap'])->name('rap.list');
});
// });
require __DIR__ . '/auth.php';
