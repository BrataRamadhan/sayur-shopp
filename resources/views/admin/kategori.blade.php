@extends('admin.layout.home')

@section('title')
<?= $title; ?>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="/admin/tambah_kategori">Add Kategori</a>

        </div>
        <div class="card-body">
        <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($data as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td> {{$ktg->nama_kategori}} </td>
                <td> Aksi </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
