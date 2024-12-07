<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FaslController;
use App\Http\Controllers\Api\FaslMemberController;
use App\Http\Controllers\Api\EventCategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::group(['as' => 'api.', 'prefix' => 'users', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('store', [UserController::class, 'store']);
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::post('change-password/{id}', [UserController::class, 'changePassword']);
    Route::post('reset-password/{id}', [UserController::class, 'resetPassword']);
});

Route::group(['as' => 'api.', 'prefix' => 'fasls', 'middleware' => ['auth:sanctum']], function () {
    Route::get('', [FaslController::class, 'index']);
    Route::post('store', [FaslController::class, 'store']);
});

Route::group(['as' => 'api.', 'prefix' => 'faslMember', 'middleware' => ['auth:sanctum']], function () {
    Route::get('', [FaslMemberController::class, 'index']);
    Route::post('store', [FaslMemberController::class, 'store']);
    Route::post('update/{id}', [FaslMemberController::class, 'update']);
});

Route::group(['as' => 'api.', 'prefix' => 'event-category', 'middleware' => ['auth:sanctum']], function () {
    Route::get('', [EventCategoryController::class, 'index']);
    Route::post('store', [EventCategoryController::class, 'store']);
    Route::post('update/{id}', [EventCategoryController::class, 'update']);
});
