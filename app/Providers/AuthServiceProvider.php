<?php

namespace App\Providers;

use App\Services\Auth\AdminAuth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('admin', function ($app, $name, array $config) {
            return new AdminAuth(Auth::createUserProvider($config['provider']));
        });
    }
}
