<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //$users = User::where('expire', 1)->get();
        $users = User::all();
        // dd($users);
        foreach ($users as $user) {
            // dd($user);
             $user->update(['expire' => 1]);
            // $user->expire=0;
            // $user->save();
        }
        $this->info('Command executed successfully.');
    }
}
