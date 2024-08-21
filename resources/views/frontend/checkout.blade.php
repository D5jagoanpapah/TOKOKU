@extends('layouts.front')

@section('title')
    Checkout 
@endsection


@section('content')
    <div class="container">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="row py-5 ">
                <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>personal data</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name : </label>
                                <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="First Name..." required>
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name : </label>
                                <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Last Name..." required>
                                <span id="lname_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email : </label>
                                <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Last Email..." required>
                                <span id="email_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number : </label>
                                <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Phone Number..." required>
                                <span id="phone_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1 : </label>
                                <input type="text" class="form-control address1" value="{{ Auth::user()->address_1 }}" name="address1" placeholder="Address 1..." required>
                                <span id="address1_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2 : </label>
                                <input type="text" class="form-control address2" value="{{ Auth::user()->address_2 }}" name="address2" placeholder="Address 2..." required>
                                <span id="address2_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City : </label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="City..." required>
                                <span id="city_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State : </label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="State..." required>
                                <span id="state_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country : </label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Country..." required>
                                <span id="country_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code : </label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Pin..." required>
                                <span id="pincode_error" class="text-danger"></span>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Detail</h6>
                        <hr>
                        <table class="table table-striped checkout-form">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>Rp.{{ $item->products->selling_price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>

                             <button type="submit" class="btn btn-outline-primary w-100 mb-3">Beli Sekarang <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                            
                             {{-- <button type="button" id="pay-button" class="btn btn-outline-warning w-100">Pilih pembayaran lain <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button> --}}

                        </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    @endsection
    
    
    