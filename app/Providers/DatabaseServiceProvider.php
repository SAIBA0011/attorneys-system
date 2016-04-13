<?php

namespace App\Providers;

use App\Repositories\Partner\PartnerRepository;
use App\Repositories\Partner\PartnerRepositoryInterface;
use App\Repositories\Sponsor\SponsorRepository;
use App\Repositories\Sponsor\SponsorRepositoryInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Speaker\SpeakerRepository;
use App\Repositories\Speaker\SpeakerRepositoryInterface;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SpeakerRepositoryInterface::class, SpeakerRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SponsorRepositoryInterface::class, SponsorRepository::class);
    }
}
