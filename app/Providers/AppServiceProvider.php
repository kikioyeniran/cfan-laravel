<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\art_category;
use App\company_details;
use App\Event;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $new = new art_category();
        $cat_links = $new->getCategories();
        $new2 = new company_details();
        $comp_details = $new2->getCompDetails();
        $new3 = new Event();
        $events = $new3->getEvents();
        View::share('cat_links', $cat_links);
        View::share('comp_details', $comp_details);
        View::share('events', $events);
    }
}
