<div class="aside wrapper bg-dark min-vh-100 p-4">
    <nav id="sidebar">
        <div class="bg-wrap mb-5 img text-center">
            <img class="m-1" src="{{ "/storage/".Auth()->user()->avatar }}" alt="">
            <p class="text-light mt-1 fw-bold">{{auth()->user()->name}}</p>
        </div>
        <ul class="list-unstyled components mb-5">
            <a href="{{route('admin.home')}}" class="mb-4 d-block li text-decoration-none p-2 @yield('home')">
                <span class="fa text-secondary fa-home me-2"></span>
                <span class="text-secondary a nav-link"> Home</span>
            </a>
            <a href="{{route ('admin.category')}}" class="mb-4 d-block li text-decoration-none p-2 @yield('catgory')" >
                <span class="fa-solid fa-list text-secondary me-2 notif"></span>
                <span class="text-secondary a nav-link">Categories</span>
            </a>
            <a href="{{route('admin.product')}}" class="dropdown d-block li px-2 text-decoration-none @yield('product')" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fa-solid fa-boxes-stacked text-secondary me-2"></span>
                <span class="text-secondary dropdown-toggle a nav-link">
                    Products
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="text-secondary dropdown-item" href="{{route('admin.product')}}">Add Product</a></li>
                            <li><a class="text-secondary dropdown-item" href="{{route('admin.products')}}">View Products</a></li>
                        </ul>
                </span>
            </a>
            <a href="{{route ('admin.order')}}" class="mb-4 mt-4 d-block li text-decoration-none p-2 @yield('orders')" >
                <span class="fa-brands fa-first-order-alt text-secondary me-2"></span>
                <span class="text-secondary a nav-link">Orders</span>
            </a>

            <a href="{{route ('admin.set')}}" class="mb-4 d-block li text-decoration-none p-2 @yield('set-admin')" >
                <span class="fa-solid fa-user-shield text-secondary me-2"></span>
                <span class="text-secondary a nav-link">Set Admin</span>
            </a>

            <a href="{{route ('profile.edit')}}" class="mb-4 d-block li text-decoration-none p-2" >
                <span class="fa-solid fa-gear text-secondary me-2"></span>
                <span class="text-secondary a nav-link">Settings</span>
            </a>
        </ul>
    </nav>
</div>
