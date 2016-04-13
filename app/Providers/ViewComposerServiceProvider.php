<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Day;
use App\Models\Category;
use App\Models\EventInfo;
use App\Models\HomePage;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Speaker;
use App\Models\SponsorPageContent;
use App\User;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.admin', function($view)
        {
            $view->with('currentUser', Auth::user('is_admin', true)->first());
            $view->with('days', Day::all());
            $view->with('about', AboutUs::all());
            $view->with('information', EventInfo::all());
            $view->with('sponsorPage', SponsorPageContent::first());
        });

        view()->composer('frontend.home', function($view){
            $view->with('partners', Partner::all());
            $view->with('slides', Slider::all());
            $view->with('boxes', HomePage::all());
            $view->with('speakers', Speaker::all());
            $view->with('event', EventInfo::all());
        });

        view()->composer('frontend.partials.nav', function($view){
            if(CurrentUser()){
                $view->with('threads', Thread::forUserWithNewMessages(CurrentUser()->id)->latest('updated_at')->get());
            }
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
