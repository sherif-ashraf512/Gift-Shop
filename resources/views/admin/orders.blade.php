@extends('layouts.main')

@section('title')
    Orders
@endsection

@section('content')
    <body style="background-color: black">
        <!-- Include the navigation bar -->
        @include('layouts.admin.navbar')

        <!-- Extend and activate the 'orders' section in the sidebar -->
        @extends('layouts.admin.sidebar')
        @section('orders')
            active
        @endsection

        <div class="content">
            <div class="px-4">
                <!-- Check if there are any orders -->
                @if(count($orders) > 0)
                    <!-- Header for orders table -->
                    <h1 class="text-light">All Orders</h1>

                    <!-- Orders table -->
                    <table class="table p-3 mb-3 text-center table-dark table-hover">
                        <thead class="fw-bold fs-5">
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Product Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Requested At</th>
                                <th scope="col">Status</th>
                                <th scope="col">Change Status</th>
                                <th scope="col">Print PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through each order and display its details -->
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->rec_name}}</td>
                                    <td>{{$order->rec_address}}</td>
                                    <td>{{$order->rec_phone}}</td>
                                    <td>{{$order->product->title}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td>
                                        <!-- Display product image -->
                                        <img width="100" src="{{"storage/".$order->product->image}}" alt="Product Image">
                                    </td>
                                    <td class="status">{{$order->payment_status}}</td>
                                    <td class="status">{{$order->created_at->diffForHumans()}}</td>
                                    <td class="status">{{$order->status}}</td>
                                    <td>
                                        <!-- Buttons to change the status of the order -->
                                        <a class="d-inline-block m-1 fw-bold btn btn-danger" href="{{route('on_way',$order->id)}}">On The Way</a>
                                        <a class="d-inline-block m-1 fw-bold btn btn-success" href="{{route('delivered',$order->id)}}">Delivered</a>
                                    </td>
                                    <td>
                                        <!-- Button to print the order -->
                                        <a href="{{route('order.print',$order->id)}}" class="btn btn-secondary m-1 fw-bold">Print</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination controls -->
                    <div class="d-flex justify-content-center p-3" data-bs-theme="dark">
                        {{$orders->links()}}
                    </div>

                @else
                    <!-- Message displayed if there are no orders -->
                    <div class="text-center">
                        <p class="translate-middle fw-bold fs-3 text-danger">There Are No Orders</p>
                    </div>
                @endif
            </div>
        </div>
    </body>
@endsection
