@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <!-- Extend and activate the 'home' section in the navbar -->
    @extends('layouts.home.navbar')
    @section('home')
        active
    @endsection

    <div class="container mt-1 text-center">
        <!-- Main heading for the home page -->
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    <!-- Include the welcome section -->
    @include('layouts.home.welcome')

    <!-- Include the products section -->
    @include('layouts.home.products')
@endsection

@section('footer')
    <!-- Include the footer -->
    @include('layouts.home.footer')
@endsection
