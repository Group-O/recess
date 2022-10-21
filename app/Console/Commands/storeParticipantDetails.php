<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mysqli;

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
        $conn= new mysqli('localhost','root','','anka');
        if(file_exists("participant.txt")){
            $part_details=file_get_contents("participant.txt");
        }
        $part_array=explode(";",$part_details);
        $sql = "INSERT INTO participants( 'name', 'password', 'product') VALUES ('{part_array[0]}','{part_array[1]','{part_array[2]}')";
        unlink("participant.txt");
    if($conn->query($sql)===TRUE){
        echo "New record created successfully";
    }else{
        echo "Error".$sql ."<br>".$conn->error;
    }
    $conn=close();
        return 0;
    }
}
