<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\AuthInterfaceRepository;
use App\Repositories\Calandrier\CalandrierInterfaceRepository;
use App\Repositories\Calandrier\CalandrierRepository;
use App\Repositories\comment\CommentInterfaceRepository;
use App\Repositories\comment\CommentRepository;
use App\Repositories\compte\CompteInterfaceRepository;
use App\Repositories\compte\CompteRepository;
use App\Repositories\post\PostInterfaceRepository;
use App\Repositories\post\PostRepository;
use App\Repositories\profile\ProfileInterfaceRepository;
use App\Repositories\profile\ProfileRepository;
use App\Repositories\reaction\ReactionInterfaceRepository;
use App\Repositories\reaction\ReactionRepository;
use App\Repositories\recherche\RechercheInterfaceRepository;
use App\Repositories\recherche\RechercheRepository;
use App\Repositories\reservation\ReservationInterfaceRepository;
use App\Repositories\reservation\ReservationRepository;
use App\Repositories\singlePage\SinglePageInterfaceRepository;
use App\Repositories\singlePage\SinglePageRepository;
use App\Repositories\specialite\SpecialiteInterfaceRepository;
use App\Repositories\specialite\SpecialiteRepository;
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
        $this->app->bind(SpecialiteInterfaceRepository::class, SpecialiteRepository::class);
        $this->app->bind(CommentInterfaceRepository::class, CommentRepository::class);
        $this->app->bind(ReactionInterfaceRepository::class,ReactionRepository::class);
        $this->app->bind(ReservationInterfaceRepository::class,ReservationRepository::class);
        $this->app->bind(SinglePageInterfaceRepository::class,SinglePageRepository::class);
        $this->app->bind(CompteInterfaceRepository::class,CompteRepository::class);
        $this->app->bind(RechercheInterfaceRepository::class,RechercheRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
