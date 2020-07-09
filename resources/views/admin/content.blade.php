@extends('admin.layout.home')

@section('title')
<?= $title; ?>
@endsection

@section('content')
<div class="jumbotron">
    @foreach($data as $barang)
        <h1>{{$barang->nama_barang}} </h1>
        @foreach($barang->kategori as $kategori)
            <h2>{{$kategori->nama_kategori}} </h2>
        @endforeach
    @endforeach
</div>


@endsection