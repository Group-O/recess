<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('create:user')->everyMinute();
         $schedule->command('display:performance')->everyMinute();
         $schedule->command('display:details')->everyMinute();
         $schedule->command('insert:product_details')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected $commands = [
        Commands\CreateUserAccount::class,
        Commands\performance::class,
        Commands\storeParticipantDetails::class,
        Commands\InsertProductDetails::class,
    ];
}    

