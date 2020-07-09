<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OngkirController extends Controller
{
    //
    public function ongkir(){
        return view ('kirim.ongkir');
    }
}
