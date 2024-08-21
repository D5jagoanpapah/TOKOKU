@extends('layouts.front')

@section('title')
    Favorite
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            
            <a href="{{ url('/') }}">
                Home
            </a> /
            <a href="{{ url('wishlist') }}">
                Wishlist
            </a>
        
        </h6>
    </div>
</div>

    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">

                @if ($wishlist->count() > 0)
                   
                    @foreach ($wishlist as $item)
                        
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="100px" alt="Image">
                        </div>
                        <div class="col-md-2">
                            <h3 class="mt-5" style="font-size: large;">{{ $item->products->name }}</h3>
                        </div>
                        <div class="col-md-2 mb-1">
                            <h3 class="mt-5" style="font-size: large;">Rp.{{ $item->products->selling_price }}</h3>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if($item->products->qty >= $item->prod_qty)
                            <label class="mt-3" for="quantity">Jumlah :</label>
                            <div class="input-group text-center mb-3" style="width: 120px;">
                                <button class="input-group-text  kurang">-</button>
                                <input type="text" name="quantity" value="1" class="form-control text-center qty-input">
                                <button class="input-group-text  tambah">+</button>
                            </div>
                            @else
                            <h6 class="mt-4">Stok Habis <i class="fa fa-frown-o" aria-hidden="true"></i></h6>
                            @endif
    
                        </div>
                        <div class="col-md-2 mt-4">
                            <button class="btn btn-success addToCartBtn"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> Keranjang</button>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash" aria-hidden="true"></i> batalkan</button>
                        </div>
                    </div>
    
                    @endforeach
    
                </div>
                @else 
                <div class="card-body text-center">
                    <h2 class="py-3">Kamu tidak memiliki wishlist <i class="fa fa-frown-o" aria-hidden="true"></i></h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-warning ">Lanjut Belanja</a>
                </div>
                @endif
            </div>
        </div>
    


@endsection