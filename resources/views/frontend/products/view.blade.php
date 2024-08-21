@extends('layouts.front')

@section('title', $products->name)

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections /  {{ $products->category->name }} / {{ $products->name }}</h6>
        </div>
    </div>


    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('assets/uploads/products/'.$products->image) }}"  class="w-100" alt="">
                        </div>
                        <div class="col-md-8">
                            <h2 class="mb-0">
                                    {{ $products->name }}
                                    @if($products->trending == '1')
                                    <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                                    @endif
                            </h2>
                            
                            <hr>

                            <label class="me-3">Harga : <s>Rp {{ $products->original_price }}</s></label>
                            <label class="me-3"> <b> Diskon :  Rp {{ $products->selling_price }}</b></label>
                            <p class="mt-3">
                                    {!! $products->small_description !!}
                            </p>

                            <hr>
                            @if($products->qty > 0)
                            <label class="badge bg-success">Produk Tersedia</label>
                            @else
                            <label class="badge bg-danger">Produk Habis</label>
                            @endif

                            
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <label for="quantity">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                            <button class="input-group-text kurang">-</button>
                                            <input type="text" name="quantity" value="1" class="form-control text-center qty-input">
                                            <button class="input-group-text tambah">+</button>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <br>
                                    @if($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Keranjang <i class="fa fa-cart-plus"></i></button>
                                    @endif
                                    <button type="button" class="btn btn-success me-3 addToWishlist float-start">Favorite <i class="fa fa-heart"></i></button>
                                </div>
                            </div> 
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <hr>
                            <h3 class="ms-5">Deskripsi <i class="fa fa-commenting-o"></i></h3>
                            <p class="mt-3 ms-5">{{ $products->description }}</p>
                            <hr>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>

    <br>


@endsection

