<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\PostcardSendingService;
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
        //register 1 class với container
        $this->app->singleton(PaymentGateway::class, function ($app) {
            return new PaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Postcard', function ($app) {
            return new PostcardSendingService('us', 4, 6);
        });
    }
}
