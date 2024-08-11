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
            <!-- Container for the "Add Product" form -->
            <div class="bg-dark mb-3 p-3 text-secondary">
                <!-- Header for adding a new product -->
                <h1 class="text-light mb-5">Add Product</h1>

                <!-- Display validation errors if any -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form for adding a new product -->
                <form action="{{route('product.add')}}" method="POST" data-bs-theme="dark" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Title Input -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold fs-4" name="title" placeholder="Title" value="{{old('title')}}" id="title">
                        <label for="title" class="form-label">Title</label>
                    </div>

                    <!-- Product Description Input -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3">{{old('description')}}</textarea>
                        <label for="description" class="form-label">Description</label>
                    </div>

                    <!-- Product Quantity Input -->
                    <div class="form-floating mb-3">
                        <input type="number" min="0" class="form-control fw-bold fs-4" name="quantity" value="0" placeholder="Quantity" value="{{old('quantity')}}" id="quantity">
                        <label for="quantity" class="form-label">Quantity</label>
                    </div>

                    <!-- Product Price Input -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold fs-4" name="price" placeholder="Price" value="{{old('price')}}" id="price">
                        <label for="price" class="form-label">Price</label>
                    </div>

                    <!-- Product Category Dropdown -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select bg-dark text-secondary" id="category" name="category" aria-label="Default select example">
                            @foreach($categories as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Product Image Upload -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn fw-bold submit">Add Product</button>
                </form>
            </div>
        </div>
    </body>
@endsection
