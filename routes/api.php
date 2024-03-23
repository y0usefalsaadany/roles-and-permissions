<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::apiResource('post', PostController::class)->middleware('auth');
Route::post('/rolesPermissions', [RolePermissionController::class, 'store']);
Route::apiResource('role', RoleController::class)->middleware('auth');
Route::apiResource('permission', PermissionController::class)->middleware('auth');
