<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2021 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

use App\Http\Controllers\Auth\ConsentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/**
 * Prefix: /auth/
 * Namespace: Auth
 * Name: Auth.
 */
Route::post('login', LoginController::class);
Route::get('consent', ConsentController::class);
