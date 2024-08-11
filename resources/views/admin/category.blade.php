@extends('layouts.main')
@section('title')
    category
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
            <h1 class="text-light mb-5">Add Category</h1>

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

            {{-- Form to add a new category --}}
            <form action="{{route('category.add')}}" method="post">
                @csrf
                <input class="form-control fw-bold fs-4" placeholder="Add Category Name" type="text" name="name" value="{{old('name')}}">
                <input class="btn px-5 mt-4 text-light fw-bold btn-lg submit" type="submit" value="Add Category">
            </form>
        </div>

        {{-- Display list of categories, if any exist --}}
        @if(count($categories) > 0)
            <table class="table p-3 mb-3 text-center table-dark table-striped">
                <thead class="fw-bold fs-5">
                    <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="fs-4">{{$category->category_name}}</td>
                            <td>
                                {{-- Edit button --}}
                                <a class="btn btn-info d-inline-block m-1 fw-bold" href="{{route('category.edit', $category->id)}}">Edit</a>
                                {{-- Delete button with confirmation prompt --}}
                                <a onclick="return confirm('Are You Sure You Want Delete This Category ?')" class="btn btn-danger m-1 d-inline-block fw-bold" href="{{route('category.delete', $category->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

@endsection
