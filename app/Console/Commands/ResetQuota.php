<?php

namespace App\Console\Commands;

use App\Models\Server;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetQuota extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:quota';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset quota for any server';

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
        DB::transaction(function () {
            $servers = Server::all();
            foreach ($servers as $server) {
                $server->resetCurrent();
            }
        });
        $this->info('Successfully reseted all servers quota');
    }
}
