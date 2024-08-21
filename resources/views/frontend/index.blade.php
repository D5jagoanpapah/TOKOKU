@extends('layouts.front')

@section('title')
    TOKOKU
@endsection


@section('content')
        @include('layouts.inc.carosel')

        <div class="py-5">  
            <div class="container">
                <div class="row">
                    <h2 class="mb-5 text-center"><span class="text-white">Featured Product</span></h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                       
                        @foreach ($featured_products as $prod)
                        <div class="item ">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="product">
                                <div class="card-body">
                                    <h4>{{ $prod->name }}</h4>
                                    <span class="float-start text-dark"> Rp.{{ $prod->selling_price }}</span>
                                    <span class="float-end"> <s class="text-dark"> Rp.{{ $prod->original_price }} </s> </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2 class="mb-5 text-center"><span class="text-white">Trending Category</span></h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                       
                        @foreach ($featured_category as $tcate)
                        <div class="item">
                            <a href="{{ url('view-category/'.$tcate->slug) }} ">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'.$tcate->image) }}" alt="product">
                                <div class="card-body">
                                    <h4>{{ $tcate->name }}</h4>
                                    <p class="text-dark">
                                        {{ $tcate->description }}
                                    </p>
                                </div>
                            </div>
                         </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.inc.footer')

        @section('scripts')
        <script>
            $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
        </script>
        @endsection
            


@endsection

