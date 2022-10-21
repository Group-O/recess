<?php

namespace App\Console\Commands;

use mysqli;
use Illuminate\Console\Command;

class InsertProductDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:product_details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'inserts product details into the database';

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
        $conn = new mysqli( 'localhost','root','anka');
        if(file_exists("products.txt")){
            $product_details=file_get_contents("products.txt");
        }
        $product_array=explode(";",$product_details);
        $sql= "INSERT INTO products('name','stock_quantity','price','description') VALUES('{$product_array[0]}','{$product_array[1]}','{$product_array[2]}','{$product_array[3]}')";
        unlink("products.txt");
        if($conn->query(mysql)===TRUE){
            echo "New record created successfully";
        }else{
            echo "Error".$sql."<br>".$conn->error;
        }
        $conn->close();
        return 0;
    }
}
