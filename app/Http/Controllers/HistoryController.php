<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    //cek pesanan di profile
    // public function detail(){
    //     $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=0')->get();
    //     return view('profile', compact('pesanans'));
    // }
}
