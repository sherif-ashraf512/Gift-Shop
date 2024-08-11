@extends('layouts.main')
@section('title')
    edit
@endsection

@section('content')
<body style="background-color: black">
    @include('layouts.admin.navbar')
    @extends('layouts.admin.sidebar')

    @section('catgory')
        active
    @endsection

    <div class="content">
        <div class="p-3 category mb-3 text-center bg-dark">
            <h1 class="text-light mb-5">Update Category</h1>

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

            {{-- Form to update an existing category --}}
            <form action="{{route('category.update', $category->id)}}" method="post">
                @csrf
                <input class="form-control fw-bold fs-4" placeholder="Add Category Name" type="text" required value="{{$category->category_name}}" name="name">
                <input class="btn px-5 mt-4 text-light fw-bold btn-lg submit" type="submit" value="Update Category">
            </form>
        </div>
    </div>

    {{-- Include Chart.js library --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

@endsection
