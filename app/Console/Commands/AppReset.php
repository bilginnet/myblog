<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application reset';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->confirm('>>>> Do you agree that the application will be reset ? ', true)) {
            Artisan::call('migrate:fresh', ['--seed' => true]);
            Artisan::call('storage:link');
            $this->info("The application has been reset");
        } else {
            $this->info("Cancelled");
        }
    }
}
