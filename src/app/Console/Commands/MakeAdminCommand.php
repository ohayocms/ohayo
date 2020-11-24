<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give admin rights to user by email';

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
        if(!$email = $this->argument('email')) {
            $email = $this->ask('Enter user email');
        }
        $user = User::where('email', $email)->first();
        if ($user->isAdmin()) {
            $this->error('User is already got admin access');
        } else {
            $user->is_admin = 1;
            $user->save();
            $this->info('User '.$user->email.' got new admin access');
        }
        return 0;
    }
}
