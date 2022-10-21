<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //
    public function index(){
        $data = Product::all();
        return view('pages.products', ['products'=>$data]);
    }
}
