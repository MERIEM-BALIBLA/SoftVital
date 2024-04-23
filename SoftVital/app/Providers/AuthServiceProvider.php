<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\medecin\Post;
use App\Models\User;
<<<<<<< HEAD
use App\Policies\PostPolicy;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

<<<<<<< HEAD
        // Gate::define('modifier-poste', function (User $user,Post $post) {
        //     return $user->id === $post->user_id;
        // });

        // Gate::define('suprimer-poste', function (User $user,Post $post) {
        //     return $user->id === $post->user_id;
        // });   
=======
        Gate::define('modifier-poste', function (User $user,Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('suprimer-poste', function (User $user,Post $post) {
            return $user->id === $post->user_id;
        });
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }
}
