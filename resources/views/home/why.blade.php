@extends('layouts.main')

@section('title')
Why Us
@endsection

@section('content')
    {{-- Include the navigation bar layout --}}
    @extends('layouts.home.navbar')

    {{-- Set the "Why Us" section as active in the navbar or sidebar --}}
    @section('why')
    active
    @endsection

    {{-- Container for page content --}}
    <div class="container mt-1 text-center">
        <h3 class="fw-bold">GIFTOS</h3>
    </div>

    {{-- Include the "Why Us" section content --}}
    @include('layouts.home.why')
@endsection

@section('footer')
    {{-- Include the footer layout --}}
    @include('layouts.home.footer')
@endsection
