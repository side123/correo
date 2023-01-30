<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Definicion de permisos gate admin-only para
        // otorgar acceso a usuario administrador a ciertas páginas
        Gate::define('admin-only', function ($user) {
            if ($user->isAdmin == 1) {
                return true;
            }
            return false;
        });

        //
    }
}
