<?php

namespace App\Providers;

use App\Composer\GlobalVariable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['frontend.index','frontend.index','frontend.show','frontend._layout'],GlobalVariable::class);
        //
    }
}
