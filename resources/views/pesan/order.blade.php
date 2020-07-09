@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <img src="{{ url('images') }}/{{$barang->gambar}}" width="400" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-md-6">
                            <h2>{{$barang->nama_barang}}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{number_format($barang->harga)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{number_format($barang->stok)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{$barang->keterangan}}</td>
                                    </tr>

                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                            <form action="{{url('pesan')}}/{{$barang->id}}" method="post">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> add to Cart</button>
                                            </form>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="text-center" style="margin-top: 60px; margin-bottom: 30px">
    {{ $barangs->links("pagination::default") }}
</div> --}}

@endsection
