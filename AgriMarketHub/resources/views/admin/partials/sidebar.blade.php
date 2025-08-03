

<div class="sidebar-header">
    <h3>Admin Panel</h3>
</div>
<ul class="sidebar-nav">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
    <li>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin..products.*') ? 'active' : '' }}">
            <i class="fas fa-carrot"></i> Products
        </a>
    </li>
    <li>
        <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart"></i> Orders
        </a>
    </li>
    <li>
        <a href="{{ route('admin.messages') }}" class="{{ request()->routeIs('admin.messages') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i> Messages
        </a>
    </li>
    <li>
        <a href="{{ route('admin.payments') }}" class="{{ request()->routeIs('admin.payments') ? 'active' : '' }}">
            <i class="fas fa-credit-card"></i> Payments
        </a>
    </li>
</ul>
<div class="sidebar-footer">
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>