@extends('layouts.main')

@section('title')
    Shop
@endsection

@section('content')
    <!-- Extend the home navbar layout -->
    @extends('layouts.home.navbar')

    @section('shop')
        active
    @endsection

    <div class="container mt-1 text-center">
        <!-- Main heading for the shop page -->
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    <div id="shop" class="container mb-5 text-center">
        @if(count($products) > 0)
            <!-- Heading for product list -->
            <h1 class="text-black fw-bold">All Products</h1>

            <!-- Search and filter section -->
            <div class="d-flex justify-content-between">
                <!-- Search form -->
                <form action="{{route('shop.search')}}" method="GET">
                    @csrf
                    <input class="form-control w-50 d-inline-block" type="search" id="search" name="search" placeholder="Type to search...">
                    <button class="btn btn-primary d-inline-block m-2 p-2 fw-bold" type="submit">Search</button>
                </form>

                <!-- Filter dropdown -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{route('shop.filter',$category->category_name)}}">{{$category->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product grid -->
            <div class="row px-5 mt-3">
                @foreach($products as $product)
                    <div class="col mb-3">
                        <div class="product">
                            <!-- Product image -->
                            <img src="{{ "/storage/$product->image" }}" class="card-img-top" alt="{{ $product->title }}">
                            <div>
                                <!-- Product title -->
                                <div class="p-1 rounded bg-light product-title fw-bold">
                                    <p>{{$product->title}}</p>
                                </div>
                                <!-- Product price -->
                                <div class="p-2 rounded bg-light price fw-bold">
                                    <p>Price: <span class="fw-bold">${{$product->price}}</span></p>
                                </div>
                            </div>
                        </div>
                        <!-- Action buttons -->
                        <div class="d-flex">
                            <a href="{{route('product.details',$product->slug)}}" class="btn btn-primary fw-bold m-1">Details</a>
                            <a href="{{route('cart.add',$product->id)}}" class="btn submit add-to-cart text-light fw-bold m-1">Add To Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Message for no products -->
            <div class="text-center">
                <p class="translate-middel fw-bold fs-3 text-danger">There Are No Products</p>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    <!-- Include the footer layout -->
    @include('layouts.home.footer')
@endsection
