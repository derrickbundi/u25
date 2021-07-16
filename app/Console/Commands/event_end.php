<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\pagescontroller;

class event_end extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'End Event';

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
     * @return int
     */
    public function handle()
    {
        $call = new pagescontroller;
        $call->end_event();
    }
}
