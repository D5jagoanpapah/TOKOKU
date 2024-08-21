@extends('layouts.front')

@section('title')
    Pesanan
@endsection


@section('content')

<div class="container py-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Detail Pesanan mu
                            <a href="{{ url('my-order') }}" class="btn btn-outline-dark text-primary     float-end"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a>
                        </h4> 
                    </div>  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details mb-3">
                                <h4>Detail Belanja</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border ">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border ">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border">{{ $orders->email }}</div>
                                <label for="">Telepon</label>
                                <div class="border">{{ $orders->phone }}</div>
                                <label for="">Alamat</label>
                                <div class="border">
                                    {{ $orders->address1 }},
                                    {{ $orders->address2 }},
                                    {{ $orders->city }},
                                    {{ $orders->state }},
                                    {{ $orders->country }}
                                </div>
                                <label for="">Pin</label>
                                <div class="border">{{ $orders->pincode }}</div>
                              </div>
                            <div class="col-md-6">
                                <h4>Produk Detail</h4>
                                <hr>
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders->orderitems as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src="   {{ asset('assets/uploads/products/'.$item->products->image) }}" width="100px" alt="barang">
                                               
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Total pesananmu: <span class="float-end">Rp.  {{ $orders->total_price }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


