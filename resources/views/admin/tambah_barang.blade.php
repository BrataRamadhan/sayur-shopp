@extends('admin.layout.home')

@section('title')
<?= $title; ?>
@endsection

@section('content')
<div class="container-fluid">
<form action="{{url('admin/tambah_barang')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" placeholder="masukkan nama barang"> @error('nama_barang')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input class="form-control @error('harga') is-invalid @enderror" type="text" name="harga" id="harga" value="{{ old('harga') }}" placeholder="masukkan harga"> @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" id="stock" value="{{ old('stock') }}" placeholder="masukkan stock"> @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" placeholder="masukkan keterangan"> @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar"> @error('gambar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kategori_id">
                @foreach ($kategori as $ktg)
            <option value="{{$ktg->id}}">{{$ktg->nama_kategori}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group float-right">
            <button class="btn btn-lg btn-danger" type="reset">Reset</button>
            <button class="btn btn-lg btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
