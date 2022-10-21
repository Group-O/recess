<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
           [ 'name' => 'LG phone',
            'description'=> 'A smartphone with 4GB RAM and much more storage',
            'quantity'=> '20',
            'price'=> '200',
            'created_at' => now(),
            'updated_at' => now(),],
            [
            'name' => 'APPLE phone',
            'description'=> 'A smartphone with 4GB RAM and much more storage',
            'quantity'=> '81',
            'price'=> '2000',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
