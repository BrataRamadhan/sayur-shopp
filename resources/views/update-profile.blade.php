@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>My Profile</h2>
            <hr />
            <div class="form">
                <form action="{{route('updatedata',[$user->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        {{-- <input class="form-control" type="hidden" name="id" id="id" value=""> --}}
                        <label for="nama_barang">Nama</label>
                    <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="name" id="name" value="{{$user->name}}" > @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Alamat</label>
                    <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="alamat" id="alamat" value="{{$user->alamat}}" > @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">No Hp</label>
                    <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nohp" id="nohp" value="{{$user->nohp}}" > @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group float-right">
                        <button class="btn btn-lg btn-danger" type="sumbit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


