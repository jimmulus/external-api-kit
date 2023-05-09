<?php

namespace App\Providers;

use App\Services\Api\DataApi;
use App\Services\Api\Dummy\NullDummyDataAPI;
use App\Services\Api\Dummy\DummyDataAPI;
use App\Services\Api\Dummy\TestDummyDataAPI;
use Illuminate\Support\ServiceProvider;

class ExternalApiProvidersProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DataApi::class, function ($app) {
            return match (config('external-apis.dataApiProvider')) {
                'dummy' => new DummyDataAPI(),
                'testing' => new TestDummyDataAPI(),
                default => new NullDummyDataAPI(),
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
