@extends('layouts.main')

@section('title')
    Contact
@endsection

@section('content')
    <!-- Extend and activate the 'contact' section in the navbar -->
    @extends('layouts.home.navbar')
    @section('contact')
        active
    @endsection

    <div class="container mt-1 text-center">
        <!-- Heading for the contact section -->
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    <!-- Include the contact form or send section -->
    @include('layouts.home.send')
@endsection

@section('footer')
    <!-- Include the footer -->
    @include('layouts.home.footer')
@endsection
