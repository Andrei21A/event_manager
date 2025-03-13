<?php

namespace App\Providers;

use App\Models\Attendee;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Event;
use App\Policies\EventPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Event::class => EventPolicy::class,
    ];
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('delete-attendee', function (User $user, Attendee $attendee) {
            return $user->id === $attendee->user_id;
        });
    }
}
