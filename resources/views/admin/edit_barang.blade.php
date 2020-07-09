@extends('admin.layout.home')

@section('title')
<?= $title; ?>
@endsection

@section('content')
<div class="container-fluid">
        {{-- @foreach($barang->kategori as $kategori)
            <h2>{{$kategori->nama_kategori}} </h2>
        @endforeach --}}
    <form action="{{route('update-data',[$barang->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" id="id" value="{{ $barang->id_buku}}">
            <label for="nama_barang">Nama Barang</label>
            <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang}}" placeholder="masukkan nama barang"> @error('nama_barang')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input class="form-control @error('harga') is-invalid @enderror" type="text" name="harga" id="harga" value="{{ $barang->harga }}" placeholder="masukkan harga"> @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" id="stock" value="{{ $barang->stok }}" placeholder="masukkan stock"> @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="writer">Keterangan</label>
            <input class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan" id="keterangan" value="{{ $barang->keterangan }}" placeholder="masukkan keterangan"> @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>gambar</label>
          <input type="file" class="form-control" name="gambar" value="{{$barang->gambar}}">
          </div>
        <div class="form-group float-right">
            <button class="btn btn-lg btn-danger" type="reset">Reset</button>
            <button class="btn btn-lg btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
