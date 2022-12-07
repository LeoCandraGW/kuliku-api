<?php

use App\Http\Controllers\ApiLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KuliController;
use App\Http\Controllers\TransaksiController;

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
Route::middleware('auth:api')->get('/user/kuliku', function () {
    return 'asdawdaiwj';
});

Route::post('login', [ApiLoginController::class, 'login']);
Route::post('register',[ApiLoginController::class, 'register']);
Route::apiResource('kuli', KuliController::class);
Route::get('kuli/{id}', [KuliController::class, 'kuli']);
Route::get('kuliskill/{skill}', [KuliController::class, 'kuliskill']);
Route::apiResource('transaksi', TransaksiController::class);