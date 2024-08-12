@extends('layouts.main')

@section('title')
    Set Admin
@endsection

@section('content')
    <body style="background-color: black">
        <!-- Include the navigation bar -->
        @include('layouts.admin.navbar')

        <!-- Extend and activate the 'set-admin' section in the sidebar -->
        @extends('layouts.admin.sidebar')
        @section('set-admin')
            active
        @endsection

        <div class="content">
            <div class="px-4">
                <!-- Check if there are any users to display -->
                @if(count($users) > 0)
                    <h1 class="text-light">All Members</h1>
                    <!-- Search form for users -->
                    <form action="{{route('user.search')}}" method="GET" data-bs-theme="dark">
                        @csrf
                        <input class="form-control w-50 d-inline-block" type="search" id="search" name="search" placeholder="Type to search...">
                        <button class="btn d-inline-block m-2 p-2 fw-bold submit" type="submit">Search</button>
                    </form>
                    <!-- Table to display the list of users -->
                    <table class="table p-3 mb-3 text-center table-dark table-hover">
                        <thead class="fw-bold fs-5">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Type</th>
                                <th scope="col">Change Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through each user and display their details -->
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->usertype}}</td>
                                    <td>
                                        <!-- Buttons to change the user type -->
                                        <a class="d-inline-block m-1 fw-bold btn btn-danger" href="{{route('set.user',$user->id)}}">User</a>
                                        <a class="d-inline-block m-1 fw-bold btn btn-success" href="{{route('set.admin',$user->id)}}">Admin</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="d-flex justify-content-center p-3" data-bs-theme="dark">
                        {{$users->links()}}
                    </div>
                @else
                    <!-- Message displayed if no users are found -->
                    <div class="text-center">
                        <p class="translate-middle fw-bold fs-3 text-danger">There Are No Members</p>
                    </div>
                @endif
            </div>
        </div>
    </body>
@endsection
