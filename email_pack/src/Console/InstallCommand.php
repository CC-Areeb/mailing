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
        $this->AddViewFiles();
    }

    // Routes
    public function AddEmailRoutes()
    {
        $source = __DIR__ . '/../../stubs/routes/web.php';
        $getSourceContent = file_get_contents($source);
        $destination = base_path('routes/web.php');
        file_put_contents($destination, $getSourceContent, FILE_APPEND);

        copy(__DIR__ . '/../../stubs/routes/email.php', base_path('routes/email.php'));
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

    // Views
    public function AddViewFiles()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('views/emails'));
        copy(__DIR__ . '/../../stubs/resources/views/emails/email-index.blade.php', resource_path('views/emails/index.blade.php'));
        copy(__DIR__ . '/../../stubs/resources/views/emails/email-welcome.blade.php', resource_path('views/emails/welcome.blade.php'));
    }
}
