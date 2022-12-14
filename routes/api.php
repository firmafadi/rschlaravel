<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
// Route API Prefix for version 1
Route::prefix('v1')->group(function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::get('/pbb/bills', 'TagihanPBBController@list');
    Route::middleware(['auth:api', 'throttle:200,1'])->group( function(){  
        Route::get('/user', 'AuthController@me');
    });
});

