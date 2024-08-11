<div id="shop" class="container mb-5  text-center">
    @if(count($products) > 0)
    <h1 class="text-black fw-bold">Latest Product</h1>
    <div class="d-flex justify-content-between">
        <form action="{{route('search')}}" method="GET">
            @csrf
            <input class="form-control w-50 d-inline-block" type="search" id="search" name="search" placeholder="Type to search...">
            <button class="btn btn-primary d-inline-block m-2 p-2 fw-bold" type="submit">Search</button>
          </form>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filter
            </button>
            <ul class="dropdown-menu">
                @foreach($categories as $category)
                    <li><a class="dropdown-item" href="{{route('filter',$category->category_name)}}">{{$category->category_name}}</a></li>
                @endforeach
            </ul>
          </div>
    </div>
    <div class="row px-5 mt-3">
    @foreach($products as $product)
        <div class="col mb-3">
            <div class="product">
                <img src="{{ "/storage/$product->image" }}" class="card-img-top" alt="...">
                <div>
                    <div class="p-1 rounded bg-light product-title fw-bold">
                        <p>{{$product->title}}</p>
                    </div>
                    <div class="p-2 rounded bg-light price fw-bold" >
                        <p>price <span class="fw-bold">${{$product->price}}</span></p>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{route('product.details',$product->slug)}}" class="btn btn-primary fw-bold m-1">Details</a>
                <a href="{{route('cart.add',$product->id)}}" class="btn submit add-to-cart text-light fw-bold m-1">Add To Cart</a>
            </div>
        </div>
    @endforeach
    </div>
    <a class="btn all-products btn-lg px-5 text-light fw-bold" href="{{route('shop')}}">View All Product</a>
    @else
        <div class="text-center">
            <p class="translate-middel fw-bold fs-3 text-danger">There Is No Products</p>
        </div>
    @endif
  </div>
