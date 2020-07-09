<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Kategori;
use App\Pesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barangs = Barang::all();

        $data = [
            'title' => 'Dashboard',
            'content' => 'This is Dashboard',
            'data' => $barangs
        ];

        // dd($barangs);
        return view('admin/content', $data);

        // return view('admin/content', compact('barang'));
    }

    public function dataBarang()
    {
        $barangs = Barang::get();
        $data = [
            'title' => 'Data Barang',
            'content' => 'This is Data Barang',
            'data' => $barangs
        ];

        return view('admin/data_barang', $data);
    }

    public function createBarang()
    {
        $product = new Barang;
        $product->nama_barang = 'Baju Pramuka';
        $product->harga = 50000;
        $product->gambar = 'default.png';
        $product->stok = 10;
        $product->keterangan = "aku baju";

        $product->save();

        $category = Kategori::find([1, 2]);
        $product->kategori()->attach($category);

        return 'Success';
    }

    public function dataKategori()
    {
        $kategori = Kategori::get();
        $data = [
            'title' => 'Kategori',
            'content' => 'This is',
            'data' => $kategori
        ];

        return view('admin/kategori', $data);
    }

    public function tambah_barang()
    {
        $kategori = Kategori::all();
        $data = [
            'title' => 'Tambah Data',
            'content' => 'This is',
            'kategori'=>$kategori,
        ];

        return view('admin/tambah_barang', $data);
    }

    public function edit_barang($id)
    {
        $barang = Barang::where('id', $id)->first();


        $data = [
            'title' => 'Edit Data',
            'content' => 'This is',
            'barang' => $barang,
        ];

        return view('admin/edit_barang', $data);
    }

    public function verifikasi_pembayaran()
    {
        $pesanan = Pesanan::where('status', 2)->get();

        $data = [
            'title' => 'Verifikasi Pembayaran',
            'content' => 'This is',
            'data' => $pesanan
        ];

        return view('admin.verifikasi_pembayaran', $data);
        // print_r($data);
    }

}
