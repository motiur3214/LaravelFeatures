<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Api\UserController;

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
Route::prefix('v1')->group(function () {

    Route::group(['middleware' => ['cors', 'json.response']], function () {

        Route::controller(ApiAuthController::class)
            ->group(function () {
                Route::post('login', 'login');
//                    Route::post('register', 'register');
                Route::post('logout', 'logout')->middleware(['auth:api']);
            });


        Route::group(['middleware' => ['auth:api']], function () {
            Route::prefix('users')->controller(UserController::class)
                ->group(function () {
                    Route::get('/', 'index');
                    Route::post('/', 'store')->middleware(['scope:create']);
                });
        });

        Route::middleware(['auth:api'])
            ->group(function () {
                Route::get('user/details', [UserController::class, 'show']);
                Route::resources([
                    'products' => ProductController::class,
                ]);
            });
    });

});
