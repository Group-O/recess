<?php

namespace App\Console\Commands;
use App\Models\User;

use Illuminate\Console\Command;

class CreateUserAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a User Acoount in Users Table in database';

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
        $newUser=[
            'name'=> 'Andrew',
            'email'=> 'Andrew@gmail.com',
            'password'=>bcrypt('secret'),
            'role'=>'Admin',];

           $user= User::create($newUser);
           if ($user) {
            echo 'New User Andrew Created Successfully';
           }
        return 0;
    }
}
