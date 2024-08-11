<nav class="navbar bg-dark navbar-expand-lg" style="position: sticky; top: 0px; z-index:1"  data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand dashtext-3 fw-bold" href="{{route('home')}}">GIFT SHOP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @yield('home')" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('shop')" href="{{route('shop')}}">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('why')" href="{{route('why')}}">Why US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('contact')" href="{{route('contact')}}">Contact</a>
          </li>
          @if(Route::has('login'))
          @auth
          <li class="nav-item">
            <a class="nav-link @yield('orders')" href="{{route('myOrder')}}">My Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('cart')" href="{{route('myCart')}}">
              <span style="transform: translateY(5px)" class="fa-solid fa-bag-shopping"> [ <span class="dashtext-3">{{$count}}</span> ]</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('profile.edit')}}">Settings</a>
          </li>
          @endauth
          @endif
        </ul>
        <div class="d-flex text-light">
            @if(Route::has('login'))
                @auth
                <img width="50" height="50" style="border-radius: 50%;transform: translateY(5px)" src="{{ "/storage/".Auth()->user()->avatar }}" alt="user avatar" />
                <span class="nav-item m-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link class="nav-link text-light" :href="route('logout')"
                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                            <span class="fa fa-sign-out px-2"></span>
                        </x-responsive-nav-link>
                    </form>
                </span>
            @else
                <span class="nav-item m-2">
                    <a class="nav-link" href="/login"> <i class="fa-solid fa-user"></i> Login</a>
                </span>
                <span class="nav-item m-2">
                    <a class="nav-link" href="/register"> <i class="fa-solid fa-id-card"></i> Register</a>
                </span>
                @endauth
            @endif
        </div>
      </div>
    </div>
  </nav>
