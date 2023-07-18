<li class="{{ set_active('home') }}">
    <a href="{{ route('home') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('user') }}">
    <a href="{{ route('user') }}">
        <i class="fa fa-users"></i>
        <span>Manajemen User</span>
    </a>
</li>

<li>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i>{{__('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
