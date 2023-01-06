<?php

namespace CooperativeComputing\Email;

use Illuminate\Support\ServiceProvider;


class EmailingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        dd(
            __DIR__.'/../stubs/config/email.php'
        );
        $this->publishes([
            __DIR__.'/../config/email.php' => config_path('email.php'),
        ], 'CC-Emails');

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
