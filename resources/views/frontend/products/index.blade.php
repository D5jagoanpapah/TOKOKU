@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections /  {{ $category->name }} </h6>
    </div>
</div>

        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2 class="mb-5 text-center text-white">{{ $category->name }}</h2>
                    
                        @foreach ($products as $prod)
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">   
                            <div class="card">
                                    <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="product">
                                    <div class="card-body">
                                        <h4>{{ $prod->name }}</h4>
                                        <span class="float-start">{{ $prod->selling_price }}</span>
                                        <span class="float-end"> <s>{{ $prod->original_price }} </s> </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
          </div>

@endsection