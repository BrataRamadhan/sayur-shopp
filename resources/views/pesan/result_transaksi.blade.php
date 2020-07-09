@extends('layouts.template')

@section('content')
<style>
    #navigation {
        display: none;
    }
</style>
<div class="container">
    <?php
    if ($pesanan_blmdibayar) {
        $total = (int) $pesanan_blmdibayar->jumlah_harga + (int) $pesanan_blmdibayar->kode;
    }
    ?>
    @if ($pesanan_blmdibayar)
    Transfer ke nomor rekening : 0000xxxxx (BBCA) dengan nomor nominal Rp <?= number_format($total) ?>
    @else
    Transaksi Sudah Lunas
    @endif


</div>

@endsection
