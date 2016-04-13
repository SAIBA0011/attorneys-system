<?php

namespace App\Providers;

use App\Models\EventInfo;
use App\Models\SponsorPageContent;
use Illuminate\Support\ServiceProvider;

class EventInformationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.*', function($view)
        {
            $view->with('event', EventInfo::first());
            $view->with('sponsorpage', SponsorPageContent::first());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
