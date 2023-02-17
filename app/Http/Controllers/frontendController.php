<?php

namespace App\Http\Controllers;

use App\Models\Contractdata;

class frontendController extends Controller
{
    public function index(){
        return view('frontend.home',[
            'contact'=>Contractdata::all()
        ]);
    }
}
