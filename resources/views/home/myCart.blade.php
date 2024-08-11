@extends('layouts.main')

@section('title')
    Cart
@endsection

@section('content')
    <!-- Extend and activate the 'cart' section in the navbar -->
    @extends('layouts.home.navbar')
    @section('cart')
        active
    @endsection

    <div class="container mt-1 text-center">
        <!-- Main heading for the cart page -->
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    <div class="container mb-5">
        @if($count == 0)
            <!-- Message displayed when the cart is empty -->
            <div class="text-center">
                <p class="translate-middel fw-bold fs-3 text-danger">There Is No Products In Your Cart</p>
            </div>
        @else
            <!-- Table displaying cart items -->
            <table class="table text-center table-hover">
                <thead>
                    <tr>
                        <th scope="col">Product Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($carts as $cart)
                        <tr class="fw-bold">
                            <td>{{$cart->product->title}}</td>
                            <td>{{$cart->product->price}}</td>
                            <td>
                                <img width="100" src="{{"storage/".$cart->product->image}}" alt="...">
                            </td>
                            <td>
                                <a onclick="return confirm('Are You Sure You Want To Delete This Cart?')" href="{{route('cart.delete', $cart->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <!-- Accumulate total price of cart items -->
                        <input type="hidden" value="{{$total += $cart->product->price}}">
                    @endforeach
                </tbody>
            </table>
            <!-- Display total price of cart -->
            <div class="text-center mb-3 fw-bold">
                <p>Total Price Of Cart: $<span class="dashtext-3">{{$total}}</span></p>
            </div>
            <div class="d-flex justify-content-center">
                <!-- Display errors if any -->
                @if($errors->any())
                    <div class="alert me-2 alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Form to place an order -->
                <form class="w-50" method="POST" action="{{route('order.place')}}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold" name="name" placeholder="name" value="{{$cart->user->name}}" id="name">
                        <label for="name" class="form-label">Receiver Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control fw-bold" id="address" name="address" placeholder="address" rows="3">{{$cart->user->address}}</textarea>
                        <label for="address" class="form-label">Receiver Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold" name="phone" placeholder="phone" value="{{$cart->user->phone}}" id="phone">
                        <label for="phone" class="form-label">Receiver Phone</label>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary fw-bold" type="submit">Cash On Delivery</button>
                        <a class="btn btn-success fw-bold" href="{{route('stripe', $total)}}">Pay Using Card</a>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    <!-- Include the footer -->
    @include('layouts.home.footer')
@endsection
