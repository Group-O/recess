<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mysqli;
use Illuminate\Support\Facades\DB;

class storeParticipantDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stores participant details in the database';

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
        if(file_exists("Details.txt")){
            $participant_details = file_get_contents("Details.txt");
            $arr = explode("; ",$participant_details);
            $data = ['name' => $arr[0], 'password' => $arr[1], 'productName' => $arr[2], 'created_at' => new \DateTime()];
            DB::table('participants')->insert($data);
            \info("Participant inserted successfully");
        }else{
            \info("File not found");
        }
    }
}
