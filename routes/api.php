<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user-carts', [APIController::class, 'userCarts']);
Route::post('delete-item-cart', [APIController::class, 'deleteCart']);

//SHARE ALL THE ORDERS
Route::get('all-orders', [APIController::class, 'allOrders']);

Route::get('example', [APIController::class, 'ex']);
