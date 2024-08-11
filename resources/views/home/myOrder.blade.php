@extends('layouts.main')

@section('title')
    Orders
@endsection

@section('content')
    <!-- Extend and activate the 'orders' section in the navbar -->
    @extends('layouts.home.navbar')
    @section('orders')
        active
    @endsection

    <div class="container mt-1 text-center">
        <!-- Main heading for the orders page -->
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    <div class="container mb-3">
        <div class="p-2">
            @if(count($orders) > 0)
                <!-- Table displaying order details -->
                <table class="table p-3 mb-3 text-center table-hover">
                    <thead class="fw-bold fs-5">
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->product->title}}</td>
                                <td>{{$order->product->price}}</td>
                                <td class="status">{{$order->status}}</td>
                                <td>
                                    <img width="100" src="{{"storage/".$order->product->image}}" alt="...">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination controls -->
                <div class="d-flex justify-content-center p-3">
                    {{$orders->links()}}
                </div>
            @else
                <!-- Message displayed when there are no orders -->
                <div class="text-center">
                    <p class="translate-middel fw-bold fs-3 text-danger">There Is No Orders</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    <!-- Include the footer -->
    @include('layouts.home.footer')
@endsection
