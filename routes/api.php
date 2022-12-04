<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KeranjangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('Produk', ProdukController::class)->except('create', 'edit', 'show', 'index');
// Route::resource('Alamat', AlamatController::class)->except('create', 'edit', 'show', 'index');



// post route // public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/alamat', [AlamatController::class, 'store']);
Route::post('/checkouts', [checkoutController::class, 'store']);
Route::post('/keranjangs', [KeranjangController::class, 'store']);

// Get route
Route::get('/produks', [ProdukController::class, 'index']);
Route::get('/produks/{id}', [ProdukController::class, 'show']);
Route::get('/keranjangs', [KeranjangController::class, 'index']);
Route::get('/alamat', [AlamatController::class, 'index']);
Route::get('/checkouts', [CheckoutController::class, 'index']);

// put route 
Route::put('/alamat/{id}', [AlamatController::class, 'update']);
Route::put('/keranjangs/{id}', [KeranjangController::class, 'update']);

// delete route
Route::delete('/keranjangs/{id}', [KeranjangController::class, 'destroy']);
Route::delete('/alamat/{id}', [AlamatController::class, 'destroy']);

// protected route
Route::middleware('auth:sanctum')->group(function(){
    Route::resource('checkout',CheckoutController::class)->except('create', 'edit', 'show', 'index');
    Route::resource('produk',ProdukController::class)->except('create', 'edit', 'show', 'index');
    Route::resource('keranjang',KeranjangController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/produk/{id}', [ProdukController::class, 'produk']);
    Route::delete('/alamat/{id}', [AlamatController::class, 'destroy']);

});

