<?php

namespace App\Providers;

use App\FantasyPool;
use App\Invitation;
use App\Observers\FantasyPoolObserver;
use App\Observers\InvitationsObserver;
use App\Observers\UsersObserver;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Invitation::observe(InvitationsObserver::class);
        User::observe(UsersObserver::class);
        FantasyPool::observe(FantasyPoolObserver::class);

        Gate::define('owns-pool', function($user, $pool) {
            return $user->id === $pool->owner_id;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
