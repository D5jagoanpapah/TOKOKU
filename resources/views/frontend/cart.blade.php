@extends('layouts.front')

@section('title')
    Keranjang
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            
            <a href="{{ url('/') }}">
                Home
            </a> /
            <a href="{{ url('cart') }}">
                Keranjang
            </a>
        
        </h6>
    </div>
</div>

    <div class="container my-5">
        <div class="card shadow ">
            @if($cartitems->count() > 0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartitems as $item)
                    
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="100px" alt="Image">
                    </div>
                    <div class="col-md-3">
                        <h3 class="mt-5" style="font-size: large;">{{ $item->products->name }}</h3>
                    </div>
                    <div class="col-md-2 mb-1">
                        <h3 class="mt-5" style="font-size: large;">Rp.{{ $item->products->selling_price }}</h3>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        @if($item->products->qty >= $item->prod_qty)
                        <label for="quantity">Jumlah :</label>
                        <div class="input-group text-center mb-3" style="width: 120px;">
                            <button class="input-group-text ubahqty kurang">-</button>
                            <input type="text" name="quantity" value="{{ $item->prod_qty }}" class="form-control text-center qty-input">
                            <button class="input-group-text ubahqty tambah">+</button>
                        </div>
                        @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                        @else
                        <h6 class="mt-4">Stok Habis <i class="fa fa-frown-o" aria-hidden="true"></i></h6>
                        @endif

                    </div>
                    <div class="col-md-2 mt-4">
                        <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash" aria-hidden="true"></i> batalkan</button>
                    </div>
                    <hr class="mt-4">
                </div>

                @endforeach
                
            </div>
            
            <div class="card-footer">
                <h5 class="mt-1 y-2"> Total : Rp.{{ $total }}
                
                    <a  href="{{ url('checkout') }}" class="btn btn-outline-warning float-end"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Checkout <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                    </a>

                </h5>
            </div>
            @else
            <div class="card-body text-center">
                <h2 class="py-3">Keranjang <i class="fa fa-shopping-bag" aria-hidden="true"></i> kamu kosong nih </h2>
                <a href="{{ url('category') }}" class="btn btn-outline-warning ">Lanjut Belanja</a>
            </div>
            @endif
        </div>
    </div>


@endsection