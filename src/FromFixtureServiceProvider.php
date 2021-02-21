<?php

namespace Chefhasteeth\FromFixture;

use Illuminate\Support\ServiceProvider;

class FromFixtureServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes(
            [__DIR__ . '/../config/fixtures.php' => config_path('fixtures.php')],
            'config',
        );
    }
}
