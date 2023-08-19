<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ Route::currentRouteName() === 'admin' ? 'active' : '' }} ">
            <a href="{{ route('admin') }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'admin.cate.index' ? 'active' : '' }} ">
            <a href="{{ route('admin.cate.index') }}">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Category</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'admin.pro.index' ? 'active' : '' }} ">
            <a href="{{ route('admin.pro.index') }}">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Product</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">My Store</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'admin.user.index' ? 'active' : '' }} ">
            <a href="{{ route('admin.user.index') }}">
                <i class='bx bxs-group' ></i>
                <span class="text">User</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Analytics</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Message</span>
            </a>
        </li>
        
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="{{url('/')}}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Back to Client</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
