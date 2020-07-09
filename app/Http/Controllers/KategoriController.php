<?php

namespace App\Http\Controllers;
use App\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function create(){
        return view('admin/tambah_kategori');
    }
    public function store(Request $request){
        DB::table('kategoris')->insert([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/admin/kategori');
    }
}
