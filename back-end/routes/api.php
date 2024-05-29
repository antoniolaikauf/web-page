<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// controller che ritorna dati
use App\Http\Controllers\AccessoUser;
// controller per messaggi
use App\Http\Controllers\MessageUser;

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
    // chiamata per registrazione
    route::post('UserLogin', [AccessoUser::class, 'UserLogin']);
    // chiamata per accesso
    route::post('UserSignin', [AccessoUser::class, 'UserSignin']);
    // create new message
    route::post('UserMessage', [MessageUser::class, 'message']);
    // call message general
    route::get('MessageAll', [MessageUser::class, 'MessageAll']);
    // call elimina account
    route::post('DeleteAccount', [AccessoUser::class, 'deleteAccount']);
});
