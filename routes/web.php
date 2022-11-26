<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Livewire\CardCounter;
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

Route::resource('order', OrderController::class)->middleware('auth');
Route::get('/promotion/addtocart/{id}', [AddToCartController::class, 'store'])->name('cart.store');
Route::get('/cart', [AddToCartController::class, 'index'])->name('cart.index');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name(('profile.index'));
Route::get('/profile/orderdetails/{id}', [ProfileController::class, 'show'])->middleware('auth')->name(('profile.show'));
// Route::post('/cart/remove', [AddToCartController::class, 'remove'])->name('cart.remove');
// Route::post('/cart/update', [AddToCartController::class, 'update'])->name('cart.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
