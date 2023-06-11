<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Profile;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::before(function ($user, $ability) {
            if($user->isAdmin) {
                return true;
            }
        });

        Gate::define('view-profiles', function (User $user) {
            return $user->isAdmin;
        });

        Gate::define('view-profile', function (User $user, Profile $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('edit-profile', function (User $user, Profile $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('store-profile', function (User $user, Profile $post) {
            return $user->id === $post->user_id;
        });
    }
}
