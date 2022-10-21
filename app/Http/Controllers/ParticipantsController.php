<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index(){
        $data = Participant::all();
        return view('pages.shoppingCart', ['participants'=>$data]);
    }
}
