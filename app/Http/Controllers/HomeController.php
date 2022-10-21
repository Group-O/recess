<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Product;
use App\Charts\ProductsChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = Product::orderBy('quantity')->pluck('price','quantity');
        
        //fake chart
        $chart = new ProductsChart;
        $chart->labels($sales->keys());
        $chart->dataset('','bar',$sales->values())->backgroundColor('#37de32');

        return view('dashboard', compact('sales','chart'));

        

     //  return view('dashboard');
    }
    
    /**
     *  Show the application dashboard
     */
   
}
