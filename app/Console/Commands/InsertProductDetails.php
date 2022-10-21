<?php

namespace App\Console\Commands;

use DateTime;
use mysqli;
use Illuminate\Support\Facades\DB;
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

        if(file_exists("Products.txt")){
            $product_details = file_get_contents("Products.txt");
            $arr = explode("; ",$product_details);
            $data = ['name' => $arr[0], 'description' => $arr[1], 'quantity' => $arr[2], 'price' => $arr[3], 'created_at' => new \DateTime()];
            DB::table('products')->insert($data);
            \info("Product inserted successfully");
        }else{
            \info("File not found");
        }
    }
}
