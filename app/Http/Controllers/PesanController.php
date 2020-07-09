<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function order($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('pesan.order', compact('barang'));
    }
    public function orderitem(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi stok
        if ($request->jumlah_pesan > $barang->stok) {
            return redirect('pesan/' . $id);
        }

        // Cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //Simpan ke Database
        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->kode = mt_rand(1, 999);
            $pesanan->jumlah_harga = 0;
            $pesanan->url_transaksi = '';
            $pesanan->save();
        }

        // Simpan ke database pesanan details
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total pesanan
        $pesanan =  Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = ($pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan);
        $pesanan->update();



        return redirect('/');
    }

    //check-out
    public function check_out()
    {
        $pesanan =  Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function deleteitem($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        return redirect('check-out');
    }

    public function confirm()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if ($pesanan) {
            $pesanan->status = 2;
            $pesanan->update();
            $unique_pesanan = $pesanan->tanggal . '_' . $pesanan->kode;
            // return redirect('result/' . $pesanan->tanggal.$pesanan->kode);
            return redirect()->route('result_transaksi', ['id' => $unique_pesanan]);
        }
    }

    public function result_transaksi(Request $request, $id)
    {
        $split_url = explode("_", $id);
        $tanggal_pemesanan = $split_url[0];
        $kode = $split_url[1];

        $pesanan_blmdibayar = Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->where('tanggal', $tanggal_pemesanan)->where('kode', $kode)->first();
        if ($pesanan_blmdibayar) {
            $pesanan_blmdibayar->url_transaksi = $id;
            $pesanan_blmdibayar->update();
        }

        return view('pesan.result_transaksi', compact('pesanan_blmdibayar'));
    }

    public function verifikasi_pembayaran(Request $request){
        $pesanan = Pesanan::where('kode', $request->kode)->where('tanggal',$request->tanggal)->where('jumlah_harga',$request->harga)->first();
        if ($pesanan) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            foreach ($pesanan_details as $pesanan_detail) {
                $barang = Barang::where('id', $pesanan_detail->barang_id)->get();
                // $barang->stok = $barang->stok-$pesanan_detail->jumlah;
                $barang->stok = $pesanan_detail->barang->stok - $pesanan_detail->jumlah;
                // print_r($pesanan_detail->barang->stok - $pesanan_detail->jumlah);   
                // $barang->update();
                $input = [
                    'stok' => $pesanan_detail->barang->stok - $pesanan_detail->jumlah
                ];

                $update_stock = Barang::where('id', $pesanan_detail->barang_id)->update($input);

                if ($update_stock == 1) {
                    $pesanan->status = 1;
                    $pesanan->update();
                }
            }
        }
        return redirect()->route('verifikasi');
    }
}
