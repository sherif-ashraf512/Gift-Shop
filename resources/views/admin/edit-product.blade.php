@extends('layouts.main')
@section('title')
    product
@endsection

@section('content')
<body style="background-color: black">
    @include('layouts.admin.navbar')
    @extends('layouts.admin.sidebar')

    @section('product')
        active
    @endsection

    <div class="content">
        <div class="bg-dark mb-3 p-3 text-secondary">
            <h1 class="text-light mb-5">Update product</h1>

            {{-- Display validation errors, if any --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form to update product details --}}
            <form action="{{route('product.update', $product->slug)}}" method="POST" data-bs-theme="dark" enctype="multipart/form-data">
                @csrf

                {{-- Display current product image --}}
                <div class="mb-3">
                    <img height="250" src="{{"/storage/$product->image"}}" alt="Product Image">
                </div>

                {{-- Input for product title --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control fw-bold fs-4" name="title" placeholder="Title" value="{{$product->title}}" id="title">
                    <label for="title" class="form-label">Title</label>
                </div>

                {{-- Textarea for product description --}}
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3">{{$product->description}}</textarea>
                    <label for="description" class="form-label">Description</label>
                </div>

                {{-- Input for product quantity --}}
                <div class="form-floating mb-3">
                    <input type="number" min="0" class="form-control fw-bold fs-4" name="quantity" value="{{$product->quantity}}" placeholder="Quantity" id="quantity">
                    <label for="quantity" class="form-label">Quantity</label>
                </div>

                {{-- Input for product price --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control fw-bold fs-4" name="price" placeholder="Price" value="{{$product->price}}" id="price">
                    <label for="price" class="form-label">Price</label>
                </div>

                {{-- Dropdown for selecting product category --}}
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select bg-dark text-secondary" id="category" name="category" aria-label="Default select example">
                        @foreach($categories as $category)
                            <option @if($category->category_name == $product->category) selected @endif value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Input for changing product image --}}
                <div class="mb-3">
                    <label for="formFile" class="form-label">Change Image</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>

                {{-- Submit button to update product --}}
                <button type="submit" class="btn fw-bold submit">Update Product</button>
            </form>
        </div>
    </div>
</body>

@endsection
