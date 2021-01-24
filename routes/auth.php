<?php

use App\Http\Controllers\Auth\ConsentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/**
 * Prefix: /auth/
 * Namespace: Auth
 * Name: Auth
 */

Route::post('login', LoginController::class);
Route::get('consent', ConsentController::class);
