<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Backupdbschedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:backupschedule {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command dababase Backup send to email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->argument('user');
        echo $userId;
    }
}
