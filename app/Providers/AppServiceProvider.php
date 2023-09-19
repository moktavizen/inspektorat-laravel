<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->runningInConsole() || app()->runningUnitTests()) {
            View::share(
                'services',
                Service::orderBy('updated_at', 'desc')
                    ->get()
            );
            View::share(
                'contacts',
                Contact::get()
            );
        }
    }
}
