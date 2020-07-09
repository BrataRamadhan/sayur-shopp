<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barangs = Barang::paginate(9);
        // dd($barangs);
        return view('homepage', compact('barangs'));
    }


    public function profile()
    {
        $this->middleware('auth');
        $user = User::where('id', Auth::user()->id)->first();
        // $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '=',0)->get();
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->get();
        // $pesanans = Pesanan::all();
        return view('profile', compact('user', 'pesanans'));
    }

    public function detail($id)
    {
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $barangs = DB::table('barangs')->where('nama_barang', 'ilike', "%" . $cari . "%")->paginate();
        return view('homepage', compact('barangs'));
    }
}
