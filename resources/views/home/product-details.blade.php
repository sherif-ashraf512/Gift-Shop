@extends('layouts.main')

@section('title')
    Product
@endsection

@section('content')
    <!-- Extend the home navbar layout -->
    @extends('layouts.home.navbar')

    <div class="container mt-1 text-center">
        <!-- Main heading for the product page -->
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    <div class="container mb-5">
        <div class="card">
            <div class="row g-0">
                <!-- Product image section -->
                <div class="col-md-5">
                    <img width="100%" height="300" src="{{ "/storage/$product->image" }}" alt="{{ $product->title }}">
                </div>
                <!-- Product details section -->
                <div class="col-md-7 text-center p-3">
                    <!-- Product title -->
                    <div class="mb-3">
                        <h1>{{$product->title}}</h1>
                    </div>
                    <!-- Product category -->
                    <div class="mb-3 fw-bold">
                        <p><span class="fs-4">Category: </span><span class="dashtext-3 fs-3">{{$product->category}}</span></p>
                    </div>
                    <!-- Available quantity -->
                    <div class="mb-3 fw-bold">
                        <p><span class="fs-4">Available Quantity: </span> <span class="dashtext-3 fs-3">{{$product->quantity}}</span></p>
                    </div>
                    <!-- Product description -->
                    <div class="mb-3">
                        <p class="fw-bold text-secondary">{{$product->description}}</p>
                    </div>
                    <!-- Product price -->
                    <div class="mb-3">
                        <p class="fw-bold submit text-light fs-4">${{$product->price}}</p>
                    </div>
                    <!-- Add to cart button -->
                    <div class="mb-3 d-flex justify-content-center">
                        <a href="{{route('cart.add',$product->id)}}" class="btn btn-primary px-5 text-light fw-bold">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <!-- Include the footer layout -->
    @include('layouts.home.footer')
@endsection
