<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
        Gate::define('manage_admin', function(User $user){
            return $user->level === 'admin';
        });

        Gate::define('manage_petugas', function(User $user){
            return $user->level === 'petugas';
        });
    }
}

