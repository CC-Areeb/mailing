<?php

namespace CooperativeComputing\Email\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;


class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the email template and files';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $this->AddMailaibleFiles();
        $this->AddEmailRoutes();
        $this->AddEmailController();
    }

    // Routes
    public function AddEmailRoutes()
    {
        $source = __DIR__ . '/../../stubs/routes/web.php';
        $getSourceContent = file_get_contents($source);
        $destination = base_path('routes/web.php');
        file_put_contents($destination, $getSourceContent, FILE_APPEND);
    }

    // Controller
    public function AddEmailController()
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Emails'));
        copy(__DIR__ . '/../../stubs/app/Http/Controllers/Email/EmailController.php', app_path('Http/Controllers/Emails/EmailController.php'));
    }


    // Mail files
    public function AddMailaibleFiles()
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Mail'));
        copy(__DIR__ . '/../../stubs/app/Mail/Emails.php', app_path('Mail/Emails.php'));
    }
}
