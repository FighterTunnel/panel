<?php

namespace App\Console\Commands;

use Log;
use App\Models\Server;
use Illuminate\Console\Command;

class DeleteExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired tunneling account including openvpn';

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
        $servers = Server::cursor();

        Log::info('Expire deleted!');


        foreach ($servers as $server) {
            $accounts = $server->accounts()->where('expired_at', '<=', now())->get();

            foreach ($accounts as $account) {
                $account->delete();
            }
        }

        $this->info(__('Successfully deleted expired user'));
    }
}
