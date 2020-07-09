@extends('admin.layout.home')

@section('title')
<?= $title; ?>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <a href="/admin/tambah_barang">
                <button class="btn btn-primary">
                    Add Barang
                </button>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $barang)
                    <tr>
                        <td> {{$barang->nama_barang}} </td>
                        <td> {{$barang->stok}} </td>
                        <td> Rp.<?= number_format($barang->harga) ?> </td>
                        <td> {{$barang->keterangan}} </td>
                        <td> <img width="500px" src="{{ url('images') }}/{{$barang->gambar}}" class="p-4 img-fluid"> </td>
                        <td> <a href='edit_barang/{{$barang->id}}' class="btn btn-sm btn-primary">Edit</a> </td>

                        <td>
                            <form action ="{{route('delete',[$barang->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-sm btn-danger" >hapus</button>
                            </form
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
