<?php

namespace CooperativeComputing\Email;

use Illuminate\Support\ServiceProvider;

class EmailingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class
            ]);
        }
    }

    public function provides()
    {
        return [Console\InstallCommand::class];
    }
}