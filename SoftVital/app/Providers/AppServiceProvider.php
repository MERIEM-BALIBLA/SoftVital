<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\AuthInterfaceRepository;
use App\Repositories\Calandrier\CalandrierInterfaceRepository;
use App\Repositories\Calandrier\CalandrierRepository;
<<<<<<< HEAD
use App\Repositories\comment\CommentInterfaceRepository;
use App\Repositories\comment\CommentRepository;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use App\Repositories\post\PostInterfaceRepository;
use App\Repositories\post\PostRepository;
use App\Repositories\profile\ProfileInterfaceRepository;
use App\Repositories\profile\ProfileRepository;
<<<<<<< HEAD
use App\Repositories\reaction\ReactionInterfaceRepository;
use App\Repositories\reaction\ReactionRepository;
use App\Repositories\reservation\ReservationInterfaceRepository;
use App\Repositories\reservation\ReservationRepository;
use App\Repositories\specialite\SpecialiteInterfaceRepository;
use App\Repositories\specialite\SpecialiteRepository;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterfaceRepository::class, AuthRepository::class);
        $this->app->bind(ProfileInterfaceRepository::class, ProfileRepository::class);
        $this->app->bind(PostInterfaceRepository::class, PostRepository::class);
        $this->app->bind(CalandrierInterfaceRepository::class, CalandrierRepository::class);
<<<<<<< HEAD
        $this->app->bind(SpecialiteInterfaceRepository::class, SpecialiteRepository::class);
        $this->app->bind(CommentInterfaceRepository::class, CommentRepository::class);
        $this->app->bind(ReactionInterfaceRepository::class,ReactionRepository::class);
        $this->app->bind(ReservationInterfaceRepository::class,ReservationRepository::class);

=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
