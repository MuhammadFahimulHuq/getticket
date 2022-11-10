<?php

use App\Http\Controllers\PromotionController;
use App\Models\Promotion;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'isAdmin'], function () {
    Route::resource('promotion', PromotionController::class, ['expect' => 'index', 'show']);
});
Route::resource('promotion', PromotionController::class, ['only' => ['index', 'show']]);

// Route::get('/promotion/create')->middleware('auth', 'verified', 'isAdmin');
// Route::post('/promotion')->middleware('auth', 'verified', 'isAdmin');
// Route::get('/promotion/{id}/edit')->middleware('auth', 'verified', 'isAdmin');
// // Route::put('/promotion')
// Route::resource('promotion', PromotionController::class, ['only' => ['create', 'edit', 'destroy']]);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
