<?php

namespace App\Providers;
use Vonage\Client;
use Illuminate\Support\ServiceProvider;

class VonageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client([
                'api_key' => '9e0fb6b0',
                'api_secret' => 'YSzqECF8hFamuNQS',
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
