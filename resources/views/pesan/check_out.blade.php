@extends('layouts.template')

@section('content')
<style>
    #navigation {
        display: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-shopping-cart"></i> Daftar Pesanan</h3>

            @if(!empty($pesanan))
            <p align="right"><strong>Tanggal Pesan : {{$pesanan->tanggal}}</strong></p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Lain Lain</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pesanan_details as $pd)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$pd->barang->nama_barang}}</td>
                        <td>{{$pd->jumlah}}</td>
                        <td>Rp. {{number_format($pd->barang->harga)}}</td>
                        <td>Rp. {{number_format($pd->jumlah_harga)}}</td>
                        <td>
                            <form action="{{url('check-out')}}/{{$pd->id}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong>Total Pembayaran</strong></td>
                        <td><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong> </td>
                        <td>
                            <a onclick="alert('Apakah Anda Yakin Ingin Melanjutkan Pembayaran')" href="{{url('konfirmasi-barang')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</a>
                        </td>

                    </tr>

                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

@endsection