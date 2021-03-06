<nav class="nav navigation">
    <div class="nav-left">
        <a class="nav-item nav-brand">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
    <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>
    <!-- This "nav-menu" is hidden on mobile -->
    <!-- Add the modifier "is-active" to display it on mobile -->
    <div class="nav-right nav-menu">
        @if(Request::is('employees*'))
            @include('users._partials.menu')
        @endif
        <span class="nav-item">
            @if(auth()->guest())
                <a href="{{ route('login') }}" class="button is-primary">
                    <span>Login</span>
                </a>
            @else
                <a href="{{ route('logout') }}" class="button is-primary"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >
                    <span class="icon is-small">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </span>
    </div>
</nav>
