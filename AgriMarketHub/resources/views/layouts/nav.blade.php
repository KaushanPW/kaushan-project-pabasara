 <head>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
</head>
<header>
    <div class="logo">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo"> 
    </div>

    <nav>
        <ul>
            <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('/home') }}">Home</a></li>
            <li class="{{ Request::is('menu') ? 'active' : '' }}"><a href="{{ url('/menu') }}">Menu</a></li>
            <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
            <li class="{{ Request::is('order') ? 'active' : '' }}"><a href="{{ url('/order') }}">Order</a></li>
            <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact Us</a></li>
           
        </ul>
    </nav>

    @auth
    <div class="auth-buttons">
        <a href="{{ route('dashboard') }}" class="btn dashboard-btn">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
@endauth

@guest
    <div class="login-register">
        <a href="{{ route('login') }}" class="btn login-btn">Login</a>
        <a href="{{ route('register') }}" class="btn register-btn">Register</a>
    </div>
@endguest
</header>
