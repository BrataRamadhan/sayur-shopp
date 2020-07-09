@extends('admin.layout.home')

@section('title')
<?= $title = 'Kategori'; ?>
@endsection

@section('content')
<div class="container-fluid">
<form action="{{url('admin/tambah_kategori')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_barang">Nama Kategori</label>
            <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_barang') }}" placeholder="masukkan nama kategori"> @error('nama_barang')
            <div class="invalid-feedback"></div>
            @enderror
        <div class="form-group float-right">
            <button class="btn btn-lg btn-danger" type="reset">Reset</button>
            <button class="btn btn-lg btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
