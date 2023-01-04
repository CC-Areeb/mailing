<?php

namespace CooperativeComputing\Email\Console;

use Illuminate\Console\Command;


class InstallCommand extends Command
{
    protected $signature = 'install:cc-email';

    protected $description = 'Install the email template and files';

    public function handle()
    {
        $this->AddEmailRoutes();
    }

    public function AddEmailRoutes()
    {
        dd('email routes');
    }
}