<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'domain' => config('backpack.base.route_domain', 'admin.identity.eurofurence.local'),
    'prefix' => config('backpack.base.route_prefix', ''),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('/', 'AdminController@redirect');
    Route::crud('user', 'UserCrudController');
    Route::crud('group', 'GroupCrudController');
}); // this should be the absolute last line of this file
