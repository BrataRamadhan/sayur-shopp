@extends('admin.layout.home')

@section('title')
<?= $title; ?>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>No HP</th>
                        <th>Kode Unik</th>
                        <th>Jumlah Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($data as $verif)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td> {{$verif->tanggal}} </td>
                        @foreach($verif->user_detail as $user)
                        <!-- <?php print_r($user) ?> -->
                        <td> {{$user->name}} </td>
                        <td> 0{{$user->nohp}} </td>
                        @endforeach
                        <td> {{$verif->kode}} </td>
                        <td> Rp. <?= number_format($verif->jumlah_harga) ?> </td>
                        <form action="{{url('admin/verifikasi_pembayaran')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="<?= $verif->kode ?>" name="kode">
                            <input type="hidden" value="<?= $verif->tanggal ?>" name="tanggal">
                            <input type="hidden" value="<?= $verif->jumlah_harga ?>" name="harga">
                            <td><button type="submit" class="btn btn-success" onclick="return confirm('Apakah Sudah Yakin Sudah Konfirmasi Pembayaran?')">Konfirmasi Pembayaran
        </div>
        </td>
        </form>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection