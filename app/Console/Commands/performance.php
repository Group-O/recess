<?php

namespace App\Console\Commands;

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
       $conn= new mysqli ('localhost','root','anka');
       $sql = "SELECT 'name','points','stock_quantity' FROM WHERE";

       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
        $myfile = fopen("participantperformance.txt", "a") or die("unable to open file");
        while($row = $result->fetch_assoc()){
            fwrite($myfile, "Name:".$row["name"]." ");
            fwrite($myfile,"points:".$row["password"]." ");
            fwrite($myfile,"Products:".$row["product"]." ");
        }
        $conn->close();
     }
       



       


       
        return 0;
    }
}
