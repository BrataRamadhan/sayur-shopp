<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(Request $request)
    {
        $currentTime = Carbon::now();
        $this->validate($request, [
            'nama_barang' => 'required',
            // 'kategori_id' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $resorce = $request->file('gambar');
            $name = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/images", $name);
            $input = DB::table('barangs')->insert(['gambar' => $name,

            'nama_barang' => $request->nama_barang,
            // 'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stock,
            'keterangan' => $request->keterangan,
            'created_at' => $currentTime
    ]);


        return redirect('/admin/data_barang')->with('status', 'Data Produk Berhasil Ditambahkan');
    }
}

    public function edit($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $barang = Barang::where('id', $id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('admin/edit_barang', compact('barang'));

    }

    public function update(Request $request, $id){
        $update_data = \App\Barang::find($id);

        $update_data->nama_barang = $request->get('nama_barang');
        $update_data->harga = $request->get('harga');
        $update_data->stok = $request->get('stock');
        $update_data->keterangan = $request->get('keterangan');
        if($request->hasFile('gambar')){
            if ($request->gambar && file_exists(public_path('public/images/'.$request->gambar))){
                Storage::delete(unlink(\base_path().'/public/images/'.$request->gambar));
                // (unlink(\base_path().'/public/images/'.$request->gambar));
            }
            $resorce = $request->file('gambar');
            $name = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/images", $name);
            $update_data->gambar =$name;
        }
        $update_data->save();
        return redirect('/admin/data_barang');
    }

    public function delete($id){
        $file = Barang::where('id',$id)->first();
        Storage::delete(unlink(\base_path().'/public/images/'.$file->gambar));
        $barang = \App\Barang::find($id);
        $barang->delete();
        return redirect('/admin/data_barang')->with('alert-success','Berhasil Menghapus Data!');
    }
    
}
