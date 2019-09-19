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
     * Register Observers
     */
    private function registerObservers()
    {
        Invitation::observe(InvitationsObserver::class);
        User::observe(UsersObserver::class);
        FantasyPool::observe(FantasyPoolObserver::class);
    }

    /**
     * Define Gates
     */
    private function defineGates()
    {
        Gate::define('owns-pool', function($user, $pool) {
            return $user->id === $pool->owner_id;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerObservers();

        $this->defineGates();
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
