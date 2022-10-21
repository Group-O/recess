<?php

namespace App\Console\Commands;

use App\Models\Participant;
use Illuminate\Console\Command;
use mysqli;

class performance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:performance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'picks performance request from the participant and writes in a file';

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
     $participants = Participant::all();
    foreach ($participants as $key => $participant) {
        $name = $participant['name'];
        $product = $participant['productName'];
        $points = $participant['points'];
        $data = $name . " ". $product . " " . $points;
        if(file_exists("performance.txt")){
          file_put_contents("performance.txt", $data);
        }else{
            \info("File not found");
        }
    }
    }
}
