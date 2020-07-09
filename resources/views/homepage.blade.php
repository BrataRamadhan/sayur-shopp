@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if($barangs[0])
                @foreach($barangs as $barang)
                <div class="products-tabs">
                    <!-- tab -->
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ url('images') }}/{{$barang->gambar}}" width="100" height="200">
                            </div>
                            <div class="product-body">
                                <!-- <p class="product-category">Category</p> -->
                                <h3 class="product-name"><a href="#"> {{$barang->nama_barang}}</a></h3>
                                <h4 class="product-price"> <b>Rp <?= number_format($barang->harga) ?></b></h4>
                            </div>

                            @if (!Auth::user())
                            <div class="add-to-cart">
                                <a href="{{url('pesan')}}/{{$barang->id}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                            </div>
                            @elseif(Auth::user()->type === "user")
                            <div class="add-to-cart">
                                <a href="{{url('pesan')}}/{{$barang->id}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <h2>Tidak ada barang yang ditemukan</h2>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="text-center" style="margin-top: 60px; margin-bottom: 30px">
    {{ $barangs->links("pagination::default") }}
</div>

@endsection