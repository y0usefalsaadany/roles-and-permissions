<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("create_post", function (User $user) {
            return $user->role == "super_admin" ? Response::allow(): Response::deny('you cant create a post');
        });
        Gate::define("update_post", function (User $user,Post $post) {
            return $user->id == $post->user_id ? Response::allow(): Response::deny('you cant update a post');
        });
    }
}
