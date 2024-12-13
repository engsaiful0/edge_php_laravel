<?php

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
use App\Http\Controllers\ProductApiController;

Route::get('/products', [ProductApiController::class, 'index']);         // GET all products
Route::post('/products', [ProductApiController::class, 'store']);       // POST a new product
Route::put('/products/{id}', [ProductApiController::class, 'update']);  // PUT update a product
Route::delete('/products/{id}', [ProductApiController::class, 'destroy']); // DELETE a product

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
