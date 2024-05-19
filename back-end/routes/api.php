<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// controller che ritorna dati
use App\Http\Controllers\AccessoUser;

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
// gruppo chiamate
Route::group(['prefix' => '/v1'], function () {
    route::post('UserLogin', [AccessoUser::class, 'UserLogin']);
    route::get('UserSignin', [AccessoUser::class, 'UserSignin']);
});
