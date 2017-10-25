<ul class="nav justify-content-end">
    @guest
    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @endguest
</ul>
