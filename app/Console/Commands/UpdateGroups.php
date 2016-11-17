<?php

namespace App\Console\Commands;

use App\Http\Controllers\Account\AdminController;
use Illuminate\Console\Command;

class UpdateGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groups:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update groups by bsuir api';

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
        AdminController::postUpdateGroups();
    }
}
