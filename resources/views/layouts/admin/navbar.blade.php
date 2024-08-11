<div class="p-3 admin-nav bg-dark">
    <ul class="nav justify-content-end">
        <li class="text-light mt-2 me-auto">
            <h1><span>ADMIN</span> Dashboard</h1>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link class="nav-link text-secondary" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                    <span class="fa fa-sign-out px-2"></span>
                </x-responsive-nav-link>
            </form>
        </li>
    </ul>
</div>
