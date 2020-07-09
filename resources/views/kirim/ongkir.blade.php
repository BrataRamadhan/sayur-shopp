<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>checkout</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Halaman Checkout</h2>
</div>
</div>
<form class="ps-checkout__form" action="" method="post">
@csrf
<div class="row">
<div class="col-md-8">
<h3 class="mt-5 mb-5">Alamat Pengiriman</h3>
<div class="form-group ">
<label>Provinsi asal</label>
<input type="text" value="6" class="form-control" name="province_origin">
</div>
<div class="form-group ">
<label>Kota Asal</label>
<input type="text" value="40" class="form-control" id="city_origin" name="city_origin">
</div>
<div class="form-group ">
<label>Alamat<span>*</span>
</label>
<textarea name="address" class="form-control" rows="5" placeholder="Alamat Lengkap pengiriman" ></textarea>
</div>
<div class="form-group ">
<label>Provinsi Tujuan<span>*</span>
</label>
<select name="provinsi_id" id="provinsi_id" class="form-control">
<option value="">Pilih Provinsi</option>
</select>
</div>
<div class="form-group">
<input type="text" class="form-control" nama="nama_provinsi" placeholder="ini untuk menangkap nama provinsi ">
</div>
<div class="form-group ">
<label>Kota Tujuan<span>*</span>
</label>
<select name="kota_id" id="kota_id" class="form-control">
<option value="">Pilih Kota</option>
</select>
</div>
<div class="form-group">
<input type="text" class="form-control" nama="nama_kota" placeholder="ini untuk menangkap nama kota">
</div>
<div class="form-group ">
<label>Kode Pos<span>*</span>
</label>
<input type="text" name="kode_pos" class="form-control" >
</div>
</div>
<div class="col-md-4">
<div class="form-group ">
<label>Total Belanja<span>*</span>
</label>
<input type="text" name="totalbelanja" class="form-control" >
</div>
<div class="form-group ">
<label>total berat (gram) </label>
<input class="form-control" type="text" value="" id="weight" name="weight">
</div>
<div class="form-group ">
<label>total ongkos kirim </label>
<input class="form-control" type="text" id="ongkos_kirim" name="ongkos_kirim">
</div>
<div class="form-group ">
<label>total keseluruhan </label>
<input class="form-control" type="text" id="ongkos_kirim" name="ongkos_kirim">
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit">Proses Order</button>
</div>
</div>
</div>
</form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
