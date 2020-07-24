@extends('layouts.template')

@section('content')
<style>
    #navigation {
        display: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>My Profile</h2>
            <hr />
            <div class="form-login">
                <form>
                    <!-- @csrf -->
                    <div class="form-group row">
                        <label>Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                    </div>

                    <div class="form-group row">
                        <label>Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group row">
                        <label>No Handphone</label>
                        <input id="nohp" type="text" class="form-control" name="nohp" value="{{ $user->nohp }}" disabled>
                    </div>

                    <div class="form-group row">
                        <label>Alamat</label>
                        <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $user->alamat }}" disabled>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            {{-- <button type="submit" id="btn-register" class="primary-btn btn-register">
                                {{route('update-profile')}}
                            </button> --}}
                            <a href="{{route('update-profile',[$user->id])}}" class="primary-btn btn-register"></i> Update Profile</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <h2>Total Tagihan</h2>
            <hr />
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jumlah Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    ?>
                    @foreach ($pesanans as $us)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$us->tanggal}}</td>
                        <td>
                            <!-- <?php echo $us->jumlah_harga ?> -->
                            @if($us->status == 0)
                            Belum Bayar
                            @elseif($us->status == 2)
                            Transaksi Sedang Di Verifikasi Oleh Admin
                            @else
                            Sudah melakukan transaksi
                            @endif
                        </td>
                        <td>Rp. <?= number_format($us->jumlah_harga) ?></td>
                        @if($us->url_transaksi != '')
                        <td><a href="<?php echo "result/" . $us->url_transaksi; ?>">Lihat Struk</a></td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="btn btn-success" href="{{url('check-out')}}">Bayar Keranjang</a>
            <a href="{{url('ongkir')}}" class="btn btn-success"></i> ongkir</a>
        </div>
    </div>

</div>
@endsection
