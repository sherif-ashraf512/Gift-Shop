@extends('layouts.main')

@section('title')
    Product
@endsection

@section('content')
    <body style="background-color: black">
        <!-- Include the navigation bar -->
        @include('layouts.admin.navbar')

        <!-- Extend and activate the 'product' section in the sidebar -->
        @extends('layouts.admin.sidebar')
        @section('product')
            active
        @endsection

        <div class="content">
            <!-- Display any errors -->
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class='text-light'>{{$error}}</p>
                @endforeach
            @endif

            <!-- Search form for products -->
            <form action="{{route('product.search')}}" method="GET" data-bs-theme="dark">
                @csrf
                <input class="form-control w-50 d-inline-block" type="search" id="search" name="search" placeholder="Type to search...">
                <button class="btn d-inline-block m-2 p-2 fw-bold submit" type="submit">Search</button>
            </form>

            <!-- Product cards display -->
            <div class="row row-cols-1 row-cols-md-3 p-3" data-bs-theme="dark">
                @foreach ($products as $product)
                    <div class="col mb-2">
                        <div class="card">
                            <!-- Product image -->
                            <img src="{{ "/storage/$product->image" }}" class="card-img-top" height='300' alt="...">
                            <div class="card-body">
                                <!-- Product details -->
                                <h5 class="card-title fs-2">{{$product->title}}</h5>
                                <p class="card-text text-secondary">{{Str::limit($product->description, 50)}}</p>
                                <p class="card-text fw-bold dashtx-1">Category: {{$product->category}}</p>
                                <p class="card-text fw-bold dashtx-1">Quantity: {{$product->quantity}}</p>
                                <p class="card-text fw-bold dashtx-1">Price: ${{$product->price}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- Edit and Delete buttons -->
                                <a class="btn m-1 btn-info" href="{{route('product.edit',$product->slug)}}">Edit</a>
                                <a class="btn m-1 btn-danger" onclick="return confirm('Are You Sure You Want To Delete?')" href="{{route('product.delete',$product->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center p-3" data-bs-theme="dark">
                {{$products->links()}}
            </div>
        </div>
    </body>
@endsection
