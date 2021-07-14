<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Subscriber;
use Auth;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire users every minute';

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
        $users = User::where('expire' , 1)->where('is_owner' , 0)->get();
        foreach ($users as $user) {
            $user->update(['expire'=>0]);

        }

        $subscribers = Subscriber::where('expire' , 1)->get();
        foreach ($subscribers as $s) {
            $s->update(['expire'=>0]);
        }
    }
}
