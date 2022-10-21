<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Participant;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
        return view('pages.shoppingCart');
    }
    public function edit($id){
        $product= Product::find($id);
        return view('pages.shoppingCart', compact('product'));
    }
    public function update(Request $request, $id){
        $product= Product::find($id);
        $product->quantity-=$request->input('deductstock');
        

        $participant = Product::find($id)->participant;

        $returns = DB::table('bookings')->where([
            ['product_id', '=', $product->id],
            ['user_id', '=', auth()->user()->id]
            ])->count();

        if($returns != 0){
            if (intval($request->input('deductstock')) == 1) {
                $participant->points+=2;

            }elseif(intval($request->input('deductstock')) > 1) {
                $participant->points+=4;
            }
        }else{
            $participant->points+=1;
        }
        
        $participant->save();
        $product->save();
        $user = User::all();
        DB::table('bookings')->insert([
            'product_id' => $product->id,
            'user_id' =>auth()->user()->id,
            'quantity' => $request->input('deductstock')
        ]);


        return redirect('products')->with('message','Products booked, have a nice day');
    }
}
